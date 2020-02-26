<template>
    <div id="student" class="container">
      <v-card
        v-if="loaded"
        class="pa-2"
        outlined
        raised
        tile
      >
      <StudentDetails></StudentDetails>
      <StudentAttendance></StudentAttendance>
      <StudentWeekdayAttendance></StudentWeekdayAttendance>
      <StudentWeeklyRunningAttendance></StudentWeeklyRunningAttendance>
      <StudentAssessmentData></StudentAssessmentData>
      </v-card>
	</div>
</template>
<script>
import axios from "axios";
import format from "date-fns/format";
// import subDays from 'date-fns/sub_days'
import parseISO from "date-fns/parseISO";

import StudentDetails from "../components/students/StudentDetails";
import StudentAttendance from "../components/students/StudentAttendance";
import StudentWeekdayAttendance from "../components/students/StudentWeekdayAttendance";
import StudentWeeklyRunningAttendance from "../components/students/StudentWeeklyRunningAttendance";
import StudentAssessmentData from "../components/students/StudentAssessmentData";

export default {
	components: {
		StudentDetails,
		StudentAttendance,
		StudentWeekdayAttendance,
		StudentWeeklyRunningAttendance,
		StudentAssessmentData,
	},

	data() {
		return {
			// schoolname: null,
			message: null,
			loaded: false,
			endpoint: "api/dev/student/"
		};
	},
	created() {
		this.fetch();
	},
	mounted() {},
	methods: {
		fetch() {
			this.endpoint = "api/dev/student/details/" + this.schoolname + "/" + this.studentid;
        console.log(this.endpoint);
					console.log('WIIGLELELEL');
			axios
				.get(this.endpoint)
				.then(({ data }) => {
					console.log('WIIGLELELEL');
					this.student = data.data.student;
          this.loaded = true;
				});
		},
		roundOff(value, decimals) {
			return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
		},
    refresh() {
      this.loaded = false;
      this.fetch();
    }
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
			}
		},
		enddate: {
			get: function() {
				return this.$store.getters.getenddate;
			},
			set: function(newDate) {
				this.$store.commit("updateEndDate", newDate);
			}
		},
		studentid() {
			return this.$store.getters.getstudentid;
		}
	}
};
</script>
