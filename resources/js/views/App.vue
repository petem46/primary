<template>
  <v-app id="mydatadash">
    <v-navigation-drawer
      app
      :clipped="$vuetify.breakpoint.lgAndUp"
      dark
      expand-on-hover
      :mini-variant=true
      v-model="drawer"
      class="grey darken-3"
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
            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              link
            >
              <v-list-item-action v-if="child.icon">
                <v-icon :size="child.iconsize">{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title @click="updateCore(child.school, startdate, enddate)">
                  <router-link exact>{{ child.school }}</router-link>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :key="item.name"
            link
          >
            <v-list-item-action>
              <v-icon :size="item.iconsize">{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                <router-link
                  exact
                  exact-active-class="teal--yellow"
                  :to="{ name: item.name }"
                >{{ item.name }}</router-link>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      false
      app
      color="teal darken-3"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title
        style="width: 300px"
        class="ml-0 pl-4"
      >
        <span class="hidden-sm-and-down">
          <v-icon large>mdi-database-search</v-icon>
          &nbsp;&nbsp;&nbsp;{{ appName }}<v-icon>mdi-menu-right</v-icon>{{schoolname}}
        </span>
      </v-toolbar-title>
      <v-spacer />
      <v-menu
        min-width="350px"
        bottom
        left
        :close-on-content-click="closeOnContentClick"
        :open-on-hover="openOnHover"
        :offset-y="offsetY"
      >
        <template v-slot:activator="{ on }">
          <v-btn
            icon
            v-on="on"
          >
            <v-icon>mdi-apps</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-card-text>
            <v-row
              justify="space-around"
              class="text-center"
            >
              <v-col>
                <v-avatar
                  color="teal darken-2"
                  class="v-avatar--link"
                  @click="updateCore('FCAT', startdate, enddate)"
                >
                  <v-icon dark>mdi-lan</v-icon>
                </v-avatar>
                <p>FCAT</p>
              </v-col>
              <v-col>
                <v-avatar
                  color="white"
                  class="v-avatar--link"
                  @click="updateCore('Armfield', startdate, enddate)"
                >
                  <img
                    src="https://pbs.twimg.com/profile_images/918818978935353344/reyYBvky_400x400.jpg"
                    alt="A"
                  >
                </v-avatar>
                <p>Armfield</p>
              </v-col>
              <v-col>
                <v-avatar
                  color="white"
                  class="v-avatar--link"
                  @click="updateCore('Aspire', startdate, enddate)"
                >
                  <img
                    src="https://pbs.twimg.com/profile_images/503284274032701440/YdTlOg_G_400x400.jpeg"
                    alt="A"
                  >
                </v-avatar>
                <p>Aspire</p>
              </v-col>
            </v-row>
            <v-row
              justify="space-around"
              class="text-center"
            >
              <v-col>
                <v-avatar
                  color="blue"
                  class="v-avatar--link"
                  v-on:click.native="updateCore('Garstang', startdate, enddate)"
                >
                  <span class="white--text headline">GCA</span>
                </v-avatar>
                <p>Garstang</p>
              </v-col>
              <v-col>
                <v-avatar
                  color="white"
                  class="v-avatar--link"
                  @click="updateCore('Gateway', startdate, enddate)"
                >
                  <img
                    src="https://pbs.twimg.com/profile_images/1043178044511461376/iPCRKUZk_400x400.jpg"
                    alt="G"
                  >
                </v-avatar>
                <p>Gateway</p>
              </v-col>
              <v-col>
                <v-avatar
                  color="red darken-1"
                  class="v-avatar--link"
                  @click="updateCore('Hambleton', startdate, enddate)"
                >
                  <span class="white--text headline">H</span>
                </v-avatar>
                <p>Hambleton</p>
              </v-col>
            </v-row>
            <v-row
              justify="space-around"
              class="text-center"
            >
              <v-col>
                <v-avatar
                  color="red"
                  class="v-avatar--link"
                  @click="updateCore('Mereside', startdate, enddate)"
                >
                  <span class="white--text headline">M</span>
                </v-avatar>
                <p>Mereside</p>
              </v-col>
              <v-col>
                <v-avatar
                  color="white"
                  class="v-avatar--link"
                  @click="updateCore('Montgomery', startdate, enddate)"
                >
                  <img
                    src="https://pbs.twimg.com/profile_images/1106213524244783106/lFDjZrEd_400x400.png"
                    alt="M"
                  >
                </v-avatar>
                <p>Montgomery</p>
              </v-col>
              <v-col>
                <v-avatar
                  color="grey darken-4"
                  class="v-avatar--link"
                  @click="updateCore('Unity', startdate, enddate)"
                >
                  <span class="white--text headline">U</span>
                </v-avatar>
                <p>Unity</p>
              </v-col>
            </v-row>
            <v-row
              justify="space-around"
              class="text-center"
            >
              <v-col>
                <v-avatar
                  color="red"
                  class="v-avatar--link"
                  @click="updateCore('Westcliff', startdate, enddate)"
                >
                  <span class="white--text headline">WC</span>
                </v-avatar>
                <p>Westcliff</p>
              </v-col>
              <v-col>
                <v-avatar
                  color="teal"
                  class="v-avatar--link"
                  @click="updateCore('Westminster', startdate, enddate)"
                >
                  <span class="white--text headline">WM</span>
                </v-avatar>
                <p>Westminster</p>
              </v-col>
              <v-col>
                <v-avatar color="white">
                  <span class="white--text headline"></span>
                </v-avatar>
                <p></p>
              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-menu>

      <v-btn icon>
        <v-icon>mdi-help-circle-outline</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      <v-btn
        icon
        @click="logout()"
      >
        <v-icon>mdi-account</v-icon>
      </v-btn>
    </v-app-bar>

    <!-- ***************************** -->
    <!-- MAIN CONTENT - VUE ROUTER SPA -->
    <!-- ***************************** -->

    <v-content class="mb-12">
      <router-view></router-view>
    </v-content>

    <v-fab-transition>
      <v-btn
        v-scroll="onScroll"
        v-show="fab"
        fab
        dark
        fixed
        bottom
        right
        color="teal"
        @click="toTop"
      >
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
    bottomNav: 3,
    closeOnContentClick: true,
    openOnHover: false,
    offsetY: true,
    fab: false,
    dialog: false,
    drawer: null,
    loaded: false,
    who: [],
    icons: [
      "fab fa-facebook",
      "fab fa-twitter",
      "fab fa-google-plus",
      "fab fa-linkedin",
      "fab fa-instagram"
    ],
    items: [
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
        icon: "mdi-file-search-outline",
        name: "DC_Reports"
      },
      {
        icon: "mdi-account-clock-outline",
        name: "Exclusions"
      },
      {
        icon: "mdi-account-multiple",
        name: "Students"
        // iconsize: "small"
      }
    ]
  }),
  mounted() {
    /** SET USER PROPS */
    this.storeUser(this.whodis);
    this.storeUserName();
    this.storeUserSchool();
    /** SET SCHOOL NAME FROM USER EMAIL */

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
    storeUserSchool() {
      if (
        this.$store.getters.getschoolname === null ||
        this.$store.getters.getschoolname === undefined
      ) {
        this.$store.commit("updateSchoolName", this.whodisschool);
        this.$store.commit("setWhoDisSchool", this.whodisschool);
      }
    },
    storeUserName() {
      if (
        this.$store.getters.getwhodisname === null ||
        this.$store.getters.getwhodisname === undefined
      ) {
        this.$store.commit("setWhoDisName", this.whodisname);
      }
    },
    updateSchoolName(sn) {
      if (
        this.$store.getters.getwhodisschool === sn ||
        this.$store.getters.getwhodisschool === "FCAT"
      ) {
        this.$store.commit("updateSchoolName", sn);
      }
    },
    updateStartDate(sd) {
      this.$store.commit("updateStartDate", sd);
    },
    updateEndDate(ed) {
      this.$store.commit("updateEndDate", ed);
    },
    updateCore(sn, sd, ed) {
      if (
        this.$store.getters.getwhodisschool === sn ||
        this.$store.getters.getwhodisschool === "FCAT"
      ) {
        this.$store.commit("updateSchoolName", sn);
      }
      this.$store.commit("updateStartDate", sd);
      this.$store.commit("updateEndDate", ed);
      // this.$router.push({ name: 'Summary', params: { schoolname: this.schoolname, id: value.id } });
    },
    logout: function() {
      window.location.href = "/notapproved";
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
