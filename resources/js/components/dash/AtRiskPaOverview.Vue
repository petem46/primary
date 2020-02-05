<template>
    <div class="row mx-0">
        <v-col cols="12" lg="6">
            <v-card class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-skeleton-loader
                    type="list-item-avatar, list-item-three-line, card-heading, actions"
                ></v-skeleton-loader>
            </v-card>
        </v-col>
        <v-col cols="12" lg="6">
            <v-card class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-skeleton-loader
                    type="list-item-avatar, list-item-three-line, card-heading, actions"
                ></v-skeleton-loader>
            </v-card>
        </v-col>
    </div>
</template>
<script>
import axios from "axios";
export default {
    props: ['schoolname', 'percentpresent'],
    data() {
        return {
            message: null,
            loaded: false,
            school: null,
            endpoint: 'api/dev/attendancekpi/' + this.schoolname,
            school: this.schoolname,
            ppresent: this.percentpresent
        };
    },
    created() {
        this.fetch();
    },
    mounted() {
        console.log("At Risk Row Mounted.");
    },
    methods: {
        fetch() {
            axios.get(this.endpoint).then(({ data }) => {
                this.ppresent = data.data[0].ppresent;
                // setTimeout(() => this.loaded = true, 1500);
                this.loaded = true;
            });
        },
        roundOff(value, decimals) {
            return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
        }
    }
};
</script>
