<template>
  <div>
    <div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div>
    <div v-if="loaded">
        <div class="">
            <v-container fluid>
                <v-row>
                    <number-on-roll-kpi-card :schoolname="this.schoolname"></number-on-roll-kpi-card>
                    <percent-pp-kpi-card :schoolname="this.schoolname"></percent-pp-kpi-card>
                    <attendance-kpi-card :schoolname="this.schoolname"></attendance-kpi-card>
                    <percent-pa-kpi-card :schoolname="this.schoolname"></percent-pa-kpi-card>
                </v-row>
            </v-container>

        </div>
    </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                message: null,
                loaded: false,
                endpoint: 'api/dev',
                schoolname: 'Montgomery',
            };
        },
        created() {
            this.fetch();
        },
        mounted() {
            console.log('Home Page Loaded.')
        },
        methods: {
            fetch() {
                axios.get(this.endpoint)
                .then(({data}) => {
                    this.loaded = true;
                });
            }
        }
    }
</script>
