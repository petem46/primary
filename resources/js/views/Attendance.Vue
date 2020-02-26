<template>
	<div>
		<div v-if="! loaded">
			<i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...
		</div>
		<div v-if="loaded">
			<div class>
				<v-container fluid>
					<v-row>
						<div class="col-12 text-center">
							<h1 class="display-3 mx-auto my-2">{{ schoolname }} Attendance Dashboard</h1>
						</div>
						<div class="col-3">
							<v-menu
								v-model="startdatemenu"
								:close-on-content-click="false"
								:nudge-right="40"
								transition="scale-transition"
								offset-y
								min-width="290px"
							>
								<template v-slot:activator="{ on }">
									<v-text-field
										readonly
										:value="formattedStartDate"
										label="Start Date"
										prepend-icon="mdi-calendar-multiselect"
										v-on="on"
									></v-text-field>
								</template>
								<v-date-picker scrollable show-current v-model="startdate" @input="startdatemenu = false"></v-date-picker>
							</v-menu>
						</div>
						<div class="col-3">
							<v-menu
								v-model="enddatemenu"
								:close-on-content-click="false"
								:nudge-right="40"
								transition="scale-transition"
								offset-y
								min-width="290px"
							>
								<template v-slot:activator="{ on }">
									<v-text-field
										readonly
										:value="formattedEndDate"
										label="End Date"
										prepend-icon="mdi-calendar-multiselect"
										v-on="on"
									></v-text-field>
								</template>
								<v-date-picker scrollable show-current v-model="enddate" @input="enddatemenu = false; updateEndDate"></v-date-picker>
							</v-menu>
						</div>
					</v-row>
					<!-- <v-row>
						<nor-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></nor-kpi-card>
						<pp-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></pp-kpi-card>
						<attendance-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></attendance-kpi-card>
						<pa-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></pa-kpi-card>
					</v-row>
					<v-row>
						<cohort-summary :schoolname="this.schoolname" :enddate="this.enddate"></cohort-summary>
						<year-group-summary :schoolname="this.schoolname" :enddate="this.enddate"></year-group-summary>
						<starters-leavers-summary :schoolname="this.schoolname" :enddate="this.enddate"></starters-leavers-summary>
					</v-row> -->
					<v-row>
						<attendance-overview
							:schoolname="this.schoolname"
							:enddate="this.enddate"
							@updateWeek="updateWeek"
						></attendance-overview>
						<attendance-week
							:schoolname="this.schoolname"
							:enddate="this.enddate"
							:attendanceweek="this.attendanceweek"
							:attendanceforweek="this.attendanceforweek"
						></attendance-week>
					</v-row>
					<v-row>
						<at-risk-pa-overview :schoolname="this.schoolname" :enddate="this.enddate"></at-risk-pa-overview>
					</v-row>
				</v-container>
			</div>
		</div>
	</div>
</template>
<script>
import axios from "axios";
import format from "date-fns/format";
// import subDays from 'date-fns/sub_days'
import parseISO from "date-fns/parseISO";

import NorKpiCard from "../components/dash/kpiCards/NorKpiCard";
import PpKpiCard from "../components/dash/kpiCards/PpKpiCard";
import AttendanceKpiCard from "../components/dash/kpiCards/AttendanceKpiCard";
import PaKpiCard from "../components/dash/kpiCards/PaKpiCard";
import CohortSummary from "../components/dash/CohortSummary";
import YearGroupSummary from "../components/dash/YearGroupSummary";
import StartersLeaversSummary from "../components/dash/StartersLeaversSummary";
import AttendanceOverview from "../components/dash/AttendanceOverview";
import AttendancePie from "../components/dash/AttendancePie";
import AttendanceWeek from "../components/dash/AttendanceWeek";
import AtRiskPaOverview from "../components/dash/AtRiskPaOverview";

export default {
	components: {
		NorKpiCard,
		PpKpiCard,
		AttendanceKpiCard,
		PaKpiCard,
		CohortSummary,
		YearGroupSummary,
		StartersLeaversSummary,
		AttendanceOverview,
		AttendancePie,
		AttendanceWeek,
		AtRiskPaOverview
	},
	//   props: ["schoolname", "start", "end"],
	data() {
		return {
			message: null,
			startdatemenu: false,
			enddatemenu: false,
			loaded: true,
			//   endpoint: "api/dev",
			//   startdate: this.start,
			//   enddate: this.end,
			attendanceweek: null,
			attendanceforweek: null
		};
	},
	created() {
		// this.fetch();
	},
	mounted() {
		console.log("Dashboard Mounted.");
	},
	methods: {
		fetch() {
			axios.get(this.endpoint).then(({ data }) => {
				this.loaded = true;
			});
		},
		newDate() {
			console.log("New End Date has been set");
			this.loaded = false;
			this.fetch();
		},
		updateWeek(week, weekatt) {
			console.log("Emit updateWeek method triggered");
			this.attendanceweek = week;
			this.attendanceforweek = weekatt;
		},
    updateStartDate(sd) {
      this.$store.commit("updateStartDate", sd);
    },
    updateEndDate(ed) {
      this.$store.commit("updateEndDate", ed);
    },
	},
	computed: {
		formattedStartDate() {
			return this.startdate
				? format(parseISO(this.startdate), "iiii, do MMM yyyy")
				: "";
		},
		formattedEndDate() {
			return this.enddate
				? format(parseISO(this.enddate), "iiii, do MMM yyyy")
				: "";
		},
		schoolname() {
			return this.$store.getters.getschoolname;
		},
		startdate: {
      get: function() {
        return this.$store.getters.getstartdate;
      },
      set: function(newDate) {
        this.$store.commit("updateStartDate", newDate);
      },
    },
		enddate: {
      get: function() {
        return this.$store.getters.getenddate;
      },
      set: function(newDate) {
        this.$store.commit("updateEndDate", newDate);
      },
		},
	}
};
</script>
