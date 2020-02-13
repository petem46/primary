<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      :expand-on-hover="true"
      :mini-variant="false"
      app
    >
      <v-list dense>
        <template v-for="item in items">
          <!-- <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">{{ item.heading }}</v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row> -->
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
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  <a
                    :href="'?' + child.schoollink + child.school + '&' + child.startdatelink + startdate + '&' + child.enddatelink + enddate"
                  >{{ child.school }}</a>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item v-else :key="item.name" link>
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                <a
                  :href="'?' + item.schoollink + item.school + '&' + item.startdatelink + startdate + '&' + item.enddatelink + enddate"
                >{{ item.name }}</a>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      collapse-on-scroll:
      true
      app
      color="teal darken-3"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <span class="hidden-sm-and-down">
          <v-icon>mdi-hexagon-multiple-outline</v-icon>&nbsp;&nbsp;&nbsp;{{ appName }}
        </span>
      </v-toolbar-title>
      <v-spacer />
      <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      <v-btn icon large>
        <v-avatar size="32px" item>
          <v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify" />
        </v-avatar>
      </v-btn>
    </v-app-bar>

    <!-- ***************************** -->
    <!-- MAIN CONTENT - VUE ROUTER SPA -->
    <!-- ***************************** -->

    <v-content>
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
  props: {
    source: String
    //   end: Date,
  },
  data: () => ({
    schoolname: "FCAT",
    appName: "myDataDash",
    fab: false,
    start: "2019-08-26",
    end: null,
    dialog: false,
    drawer: null,
    items: [
      {
        core: "Wiggle",
        icon: "mdi-contacts",
        name: "Students",
        school: "Aspire",
        link: "school=Aspire&start=2019-08-26&end=2020-02-13",
        schoollink: "school=",
        startdatelink: "start=",
        enddatelink: "end="
      },
      {
        icon: "mdi-history",
        name: "Summary",
        school: "Aspire",
        schoollink: "school=",
        startdatelink: "start=",
        enddatelink: "end="
      },
      {
        icon: "mdi-calendar-multiselect",
        name: "Attendance",
        school: "Aspire",
        schoollink: "school=",
        startdatelink: "start=",
        enddatelink: "end="
      },
      {
        icon: "mdi-history",
        name: "Behaviours",
        school: "Aspire",
        schoollink: "school=",
        startdatelink: "start=",
        enddatelink: "end="
      },
      {
        icon: "mdi-star-box-multiple-outline",
        name: "Assessments",
        school: "Aspire",
        schoollink: "school=",
        startdatelink: "start=",
        enddatelink: "end="
      },
      {
        icon: "mdi-content-copy",
        name: "FCAT",
        school: "FCAT",
        schoollink: "school=",
        startdatelink: "start=",
        enddatelink: "end="
      },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-chevron-down",
        text: "All Through",
        model: false,
        children: [
          {
            icon: "mdi-home-export-outline",
            school: "Armfield",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          },
          {
            icon: "mdi-home-export-outline",
            school: "Unity",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          }
        ]
      },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-chevron-down",
        text: "Secondary",
        model: false,
        children: [
          {
            icon: "mdi-home-export-outline",
            school: "Aspire",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          },
          {
            icon: "mdi-home-export-outline",
            school: "Garstang",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          },
          {
            icon: "mdi-home-export-outline",
            school: "Montgomery",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          }
        ]
      },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-chevron-down",
        text: "Primary",
        model: false,
        children: [
          {
            icon: "mdi-home-export-outline",
            school: "Gateway",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          },
          {
            icon: "mdi-home-export-outline",
            school: "Hambleton",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          },
          {
            icon: "mdi-home-export-outline",
            school: "Mereside",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          },
          {
            icon: "mdi-home-export-outline",
            school: "Westcliff",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          },
          {
            icon: "mdi-home-export-outline",
            school: "Westminster",
            schoollink: "school=",
            startdatelink: "start=",
            enddatelink: "end="
          }
        ]
      }
    ]
  }),
  created() {
    // this.schoolname = schoolname;
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
  },
  computed: {
    startdate() {
      return "2019-08-26";
    },
    enddate() {
      return format(new Date(), "yyyy-MM-dd");
    },
  }
};
</script>
