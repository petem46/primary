<template>
	<v-app id="mydatadash">
		<v-navigation-drawer
			v-model="drawer"
			:clipped="$vuetify.breakpoint.lgAndUp"
			app
			:mini-variant=	true
			expand-on-hover
			permanent
		>
			<v-list dense>
				<template v-for="item in items">
					<v-list-group
						v-if="item.children"
						:key="item.name"
						v-model="item.model"
						:prepend-icon="item.model ? item.icon : item['icon-alt']"
						append-icon
					>
						<template v-slot:activator>
							<v-list-item-content>
								<v-list-item-title>{{ item.text }}</v-list-item-title>
							</v-list-item-content>
						</template>
						<v-list-item v-for="(child, i) in item.children" :key="i" link>
							<v-list-item-action v-if="child.icon">
								<v-icon :size="child.iconsize">{{ child.icon }}</v-icon>
							</v-list-item-action>
							<v-list-item-content>
								<v-list-item-title @click="updateCore(child.school, startdate, enddate)">
									<router-link exact :to="{ name: 'Summary' }">{{ child.school }}</router-link>
								</v-list-item-title>
							</v-list-item-content>
						</v-list-item>
					</v-list-group>
					<!-- <v-list-item
            v-if="item.fcat"
            :key="item.fcat"
            link
          >
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title @click="updateCore('FCAT', startdate, enddate)">
                <router-link
                  exact
                  exact-active-class="teal--text"
                  :to="{ name: 'dash' }"
                >{{ item.name }}</router-link>
              </v-list-item-title>
            </v-list-item-content>
					</v-list-item>-->
					<v-list-item v-else :key="item.name" link>
						<v-list-item-action>
							<v-icon :size="item.iconsize">{{ item.icon }}</v-icon>
						</v-list-item-action>
						<v-list-item-content>
							<v-list-item-title>
								<router-link exact exact-active-class="teal--text" :to="{ name: item.name }">{{ item.name }}</router-link>
							</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</template>
			</v-list>
		</v-navigation-drawer>

		<v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" false app color="teal darken-3" dark>
			<v-app-bar-nav-icon @click.stop="drawer = !drawer" />
			<v-toolbar-title style="width: 300px" class="ml-0 pl-4">
				<span class="hidden-sm-and-down">
					<v-icon>mdi-hexagon-multiple-outline</v-icon>
					&nbsp;&nbsp;&nbsp;{{ appName }}
				</span>
			</v-toolbar-title>
			<v-spacer />

			<v-menu bottom left :close-on-content-click="closeOnContentClick">
				<template v-slot:activator="{ on }">
					<v-btn icon v-on="on">
						<v-icon>mdi-home-city-outline</v-icon>
					</v-btn>
				</template>
				<v-list dense>
					<v-list-item-group color="primary">
						<v-subheader>Trust</v-subheader>
						<v-list-item>
							<router-link
								v-on:click.native="updateCore('FCAT', startdate, enddate)"
								:to="{ name: 'Summary' }"
							>
								<v-spacer></v-spacer>
								<v-list-item-title>
									<v-icon>mdi-home-city-outline</v-icon>FCAT
								</v-list-item-title>
							</router-link>
						</v-list-item>
					</v-list-item-group>
					<v-subheader>All Through</v-subheader>
					<v-list-item>
						<v-list-item-title>Armfield</v-list-item-title>
					</v-list-item>
					<v-list-item>
						<v-list-item-title>Unity</v-list-item-title>
					</v-list-item>
					<v-subheader>Secondary</v-subheader>
					<v-list-item>
						<v-list-item-title>Aspire</v-list-item-title>
					</v-list-item>
					<v-list-item>
						<v-list-item-title>Garstang</v-list-item-title>
					</v-list-item>
					<v-list-item>
						<v-list-item-title>Montgomery</v-list-item-title>
					</v-list-item>
					<v-subheader>Primary</v-subheader>
					<v-list-item>
						<v-list-item-title>Gateway</v-list-item-title>
					</v-list-item>
					<v-list-item>
						<v-list-item-title>Hambleton</v-list-item-title>
					</v-list-item>
					<v-list-item>
						<v-list-item-title>Mereside</v-list-item-title>
					</v-list-item>
					<v-list-item>
						<v-list-item-title>Westcliff</v-list-item-title>
					</v-list-item>
					<v-list-item>
						<v-list-item-title>Westminster</v-list-item-title>
					</v-list-item>
				</v-list>
			</v-menu>

			<v-btn icon>
				<v-icon>mdi-apps</v-icon>
			</v-btn>

			<v-btn icon>
				<v-icon>mdi-bell</v-icon>
			</v-btn>
		</v-app-bar>

		<!-- ***************************** -->
		<!-- MAIN CONTENT - VUE ROUTER SPA -->
		<!-- ***************************** -->

		<v-content>
			<router-view></router-view>
		</v-content>

		<v-fab-transition>
			<v-btn v-scroll="onScroll" v-show="fab" fab dark fixed bottom right color="teal" @click="toTop">
				<v-icon>mdi-chevron-up</v-icon>
			</v-btn>
		</v-fab-transition>
	</v-app>
</template>

<script>
import format from "date-fns/format";
// import subDays from 'date-fns/sub_days'
import parseISO from "date-fns/parseISO";
export default {
	props: [
		"whodis",
		"whodisavatar",
		"whodisemail",
		"whodisid",
		"whodisname",
		"whodisschool",
		"whodisusergroup_id"
	],
	data: () => ({
		appName: "myDataDash",
		closeOnContentClick: true,
		fab: false,
		dialog: false,
		drawer: null,
		who: [],
		items: [
			{
				icon: "mdi-account-multiple",
				name: "Students"
				// iconsize: "small"
			},
			{
				icon: "mdi-history",
				name: "Summary"
			},
			{
				icon: "mdi-star-box-multiple-outline",
				name: "Assessment"
			},
			{
				icon: "mdi-calendar-multiselect",
				name: "Attendance"
			},
			{
				icon: "mdi-shield-star-outline",
				name: "Behaviour"
			},
			{
				icon: "mdi-account-clock-outline",
				name: "Exclusions"
			},
			// {
			// 	icon: "mdi-content-copy",
			// 	name: "FCAT",
			// 	school: "FCAT",
			// 	fcat: "FCAT"
			// },
			// {
			// 	icon: "mdi-chevron-up",
			// 	"icon-alt": "mdi-chevron-down",
			// 	text: "All Through",
			// 	model: false,
			// 	children: [
			// 		{
			// 			icon: "mdi-domain",
			// 			school: "Armfield"
			// 		},
			// 		{
			// 			icon: "mdi-domain",
			// 			school: "Unity"
			// 			// iconsize: "small"
			// 		}
			// 	]
			// },
			// {
			// 	icon: "mdi-chevron-up",
			// 	"icon-alt": "mdi-chevron-down",
			// 	text: "Secondary",
			// 	model: false,
			// 	children: [
			// 		{
			// 			icon: "mdi-home-city-outline",
			// 			school: "Aspire"
			// 		},
			// 		{
			// 			icon: "mdi-home-city-outline",
			// 			school: "Garstang"
			// 		},
			// 		{
			// 			icon: "mdi-home-city-outline",
			// 			school: "Montgomery"
			// 		}
			// 	]
			// },
			// {
			// 	icon: "mdi-chevron-up",
			// 	"icon-alt": "mdi-chevron-down",
			// 	text: "Primary",
			// 	model: false,
			// 	children: [
			// 		{
			// 			icon: "mdi-home-group",
			// 			school: "Gateway"
			// 		},
			// 		{
			// 			icon: "mdi-home-group",
			// 			school: "Hambleton"
			// 		},
			// 		{
			// 			icon: "mdi-home-group",
			// 			school: "Mereside"
			// 		},
			// 		{
			// 			icon: "mdi-home-group",
			// 			school: "Westcliff"
			// 		},
			// 		{
			// 			icon: "mdi-home-group",
			// 			school: "Westminster"
			// 		}
			// 	]
			// }
		]
	}),
	mounted() {
		this.$store.commit("setUser", this.whodis);
		/** SET SCHOOL NAME FROM USER EMAIL */
		console.log(this.whodisschool);
		if (this.$store.getters.getschoolname === null) {
			this.$store.commit("updateSchoolName", this.whodisschool);
			this.$store.commit("setWhoDisSchool", this.whodisschool);
		}

		/** SET END DATE TO TODAY */
		if (this.$store.getters.getenddate === null) {
			this.$store.commit("updateEndDate", format(new Date(), "yyyy-MM-dd"));
		}
	},
	methods: {
		onScroll(e) {
			if (typeof window === "undefined") return;
			const top = window.pageYOffset || e.target.scrollTop || 0;
			this.fab = top > 20;
		},
		toTop() {
			this.$vuetify.goTo(0);
		},
		storeUser(user) {
			this.$store.commit("setUser", user);
		},
		updateSchoolName(sn) {
			this.$store.commit("updateSchoolName", sn);
		},
		updateStartDate(sd) {
			this.$store.commit("updateStartDate", sd);
		},
		updateEndDate(ed) {
			this.$store.commit("updateEndDate", ed);
		},
		updateCore(sn, sd, ed) {
			console.log("SN: " + sn);
			console.log("SD: " + sd);
			console.log("ED: " + ed);
			this.$store.commit("updateSchoolName", sn);
			this.$store.commit("updateStartDate", sd);
			this.$store.commit("updateEndDate", ed);
		}
	},
	computed: {
		schoolname() {
			return this.$store.getters.getschoolname;
		},
		startdate() {
			return this.$store.getters.getstartdate;
		},
		enddate() {
			return this.$store.getters.getenddate;
		}
	}
};
</script>
