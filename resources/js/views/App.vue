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
            :key="item.text"
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
                  <a :href="child.link">{{ child.text }}</a>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :key="item.text"
            link
          >
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                <a :href="item.link">{{ item.text }}</a>
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
  export default {
    props: {
      source: String,
    },
    data: () => ({
      schoolname: null,
      fab: false,
      dialog: false,
      drawer: null,
      items: [
        { icon: 'mdi-contacts', text: 'Students' },
        { icon: 'mdi-history', text: 'Summary' },
        { icon: 'mdi-calendar-multiselect', text: 'Attendance' },
        { icon: 'mdi-history', text: 'Behaviours' },
        { icon: 'mdi-star-box-multiple-outline', text: 'Assessments' },
        { icon: 'mdi-content-copy', text: 'FCAT', link: '?school=FCAT' },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'All Through',
          model: false,
          children: [
            { icon: 'mdi-home-export-outline', text: 'Armfield', link: '?school=Armfield' },
            { icon: 'mdi-home-export-outline', text: 'Unity', link: '?school=Unity' },
          ],
        },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'Secondary',
          model: false,
          children: [
            { icon: 'mdi-home-export-outline', text: 'Aspire', link: '?school=Aspire' },
            { icon: 'mdi-home-export-outline', text: 'Garstang', link: '?school=Garstang' },
            { icon: 'mdi-home-export-outline', text: 'Montomery', link: '?school=Montgomery' },
          ],
        },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'Primary',
          model: false,
          children: [
            { icon: 'mdi-home-export-outline', text: 'Gateway', link: '?school=Gateway' },
            { icon: 'mdi-home-export-outline', text: 'Hambleton', link: '?school=Hambleton' },
            { icon: 'mdi-home-export-outline', text: 'Mereside', link: '?school=Mereside' },
            { icon: 'mdi-home-export-outline', text: 'Westcliff', link: '?school=Westcliff' },
            { icon: 'mdi-home-export-outline', text: 'Westminster', link: '?school=Westminster' },
          ],
        },
      ],
    }),
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
  }
</script>
