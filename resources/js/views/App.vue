<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      :expand-on-hover= true
      :mini-variant= false
      app
    >
      <v-list dense>
        <template v-for="item in items">
          <v-row
            v-if="item.heading"
            :key="item.heading"
            align="center"
          >
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-col>
            <v-col
              cols="6"
              class="text-center"
            >
              <a
                href="#!"
                class="body-2 black--text"
              >EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.name"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>
                  {{ item.text }}
                </v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              link
            >
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  <a :href="'?' + child.schoollink + child.name + '&' + child.datelink + enddate">
                      {{ child.name }}
                    </a>
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
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                <a :href="'?' + item.schoollink + item.name + '&' + item.datelink + enddate">{{ item.name }}</a>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      collapse-on-scroll: true
      app
      color="teal darken-3"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title
        style="width: 300px"
        class="ml-0 pl-4"
      >
        <span class="hidden-sm-and-down"><v-icon>mdi-hexagon-multiple-outline</v-icon>&nbsp;&nbsp;&nbsp;myDataDash</span>
      </v-toolbar-title>
      <v-spacer />
      <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      <v-btn
        icon
        large
      >
        <v-avatar
          size="32px"
          item
        >
          <v-img
            src="https://cdn.vuetifyjs.com/images/logos/logo.svg"
            alt="Vuetify"
          /></v-avatar>
      </v-btn>
    </v-app-bar>

    <!-- ***************************** -->
    <!-- MAIN CONTENT - VUE ROUTER SPA -->
    <!-- ***************************** -->

    <v-content>
        <router-view></router-view>
    </v-content>

    <!-- <v-btn
      bottom
      color="pink"
      dark
      fab
      fixed
      right
      @click="dialog = !dialog"
    >
      <v-icon>mdi-home-export-outline</v-icon>
    </v-btn> -->
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
    <v-dialog
      v-model="dialog"
      width="800px"
    >
      <v-card>
        <v-card-title class="grey darken-2">
          Create contact
        </v-card-title>
        <v-container>
          <v-row class="mx-2">
            <v-col
              class="align-center justify-space-between"
              cols="12"
            >
              <v-row
                align="center"
                class="mr-0"
              >
                <v-avatar
                  size="40px"
                  class="mx-3"
                >
                  <img
                    src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png"
                    alt=""
                  >
                </v-avatar>
                <v-text-field
                  placeholder="Name"
                />
              </v-row>
            </v-col>
            <v-col cols="6">
              <v-text-field
                prepend-icon="mdi-account-card-details-outline"
                placeholder="Company"
              />
            </v-col>
            <v-col cols="6">
              <v-text-field
                placeholder="Job title"
              />
            </v-col>
            <v-col cols="12">
              <v-text-field
                prepend-icon="mdi-mail"
                placeholder="Email"
              />
            </v-col>
            <v-col cols="12">
              <v-text-field
                type="tel"
                prepend-icon="mdi-phone"
                placeholder="(000) 000 - 0000"
              />
            </v-col>
            <v-col cols="12">
              <v-text-field
                prepend-icon="mdi-text"
                placeholder="Notes"
              />
            </v-col>
          </v-row>
        </v-container>
        <v-card-actions>
          <v-btn
            text
            color="primary"
          >More</v-btn>
          <v-spacer />
          <v-btn
            text
            color="primary"
            @click="dialog = false"
          >Cancel</v-btn>
          <v-btn
            text
            @click="dialog = false"
          >Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-app>
</template>

<script>
    import format from 'date-fns/format'
    // import subDays from 'date-fns/sub_days'
    import parseISO from 'date-fns/parseISO'
  export default {
    props: {
      source: String,
    //   end: Date,
    },
    data: () => ({
      schoolname: null,
      fab: false,
      end: '2020-02-02',
      dialog: false,
      drawer: null,
      items: [
        { icon: 'mdi-contacts', name: 'Students' },
        { icon: 'mdi-history', name: 'Summary' },
        { icon: 'mdi-calendar-multiselect', name: 'Attendance' },
        { icon: 'mdi-history', name: 'Behaviours' },
        { icon: 'mdi-star-box-multiple-outline', name: 'Assessments' },
        { icon: 'mdi-content-copy', name: 'FCAT', schoollink: '?school=FCAT' },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'All Through',
          model: false,
          children: [
            { icon: 'mdi-home-export-outline', name: 'Armfield', schoollink: 'school=' },
            { icon: 'mdi-home-export-outline', name: 'Unity', schoollink: 'school=' },
          ],
        },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'Secondary',
          model: false,
          children: [
            { icon: 'mdi-home-export-outline', name: 'Aspire', schoollink: 'school=', datelink: 'end=' },
            { icon: 'mdi-home-export-outline', name: 'Garstang', schoollink: 'school=', datelink: 'end=' },
            { icon: 'mdi-home-export-outline', name: 'Montgomery', schoollink: 'school=', datelink: 'end=' },
          ],
        },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'Primary',
          model: false,
          children: [
            { icon: 'mdi-home-export-outline', name: 'Gateway', schoollink: 'school=' },
            { icon: 'mdi-home-export-outline', name: 'Hambleton', schoollink: 'school=' },
            { icon: 'mdi-home-export-outline', name: 'Mereside', schoollink: 'school=' },
            { icon: 'mdi-home-export-outline', name: 'Westcliff', schoollink: 'school=' },
            { icon: 'mdi-home-export-outline', name: 'Westminster', schoollink: 'school=' },
          ],
        },
      ],
    }),
    created() {
        this.end = '2020-02-02'
    },
    methods: {
        onScroll (e) {
            if (typeof window === 'undefined') return
            const top = window.pageYOffset ||   e.target.scrollTop || 0
            this.fab = top > 20
        },
        toTop () {
            this.$vuetify.goTo(0)
        },
    },
    computed: {
        enddate() {
            return format(new Date(), 'yyyy-MM-dd')
        }

    }
  }
</script>
