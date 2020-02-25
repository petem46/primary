<template>
	<div class="row mx-0">
		<v-col cols="12" lg="12">
			<h1>HELLO {{schoolname}} STUDENT {{studentid}}</h1>
		</v-col>
	</div>
</template>
<script>
import axios from "axios";
export default {
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
          /** MAKE COMPONENTS FOR EACH API CALL DATA BLOCK
              THIS WILL HELP WITH LOADING TIMES
              CAN LOAD COMPONENTS ONE AT A TIME
              USING SKELETON LOADERS
           */

					// this.attendance = data.data.attendance;
					// this.weekdayattendance = data.data.weekdayattendance;
					// this.weeklyrunningattendance = data.data.weeklyrunningattendance;
					// this.ppa = data.data.ppa;
					// this.primarydcdata = data.data.primarydcdata;
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
