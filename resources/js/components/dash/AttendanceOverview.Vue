<template>
    <v-col cols="12" lg="7" xl="8">
        <v-card v-if="! loaded" class="pa-2" outlined raised tile>
            <v-progress-linear indeterminate color="teal"></v-progress-linear>
            <v-card-title>
                Attendance Overview
            </v-card-title>
            <v-skeleton-loader
                type="list-item-avatar, list-item-three-line, card-heading, actions"
            ></v-skeleton-loader>
            <v-divider></v-divider>
            <v-card-actions>
                <v-btn text disabled>Loading...</v-btn>
            </v-card-actions>
        </v-card>
        <v-card v-if="loaded" class="pa-2" outlined raised tile>
            <v-card-title>
                Attendance Overview
            </v-card-title>
            <v-skeleton-loader
                type="list-item-avatar, list-item-three-line, card-heading, actions"
            ></v-skeleton-loader>
            <v-divider></v-divider>
            <v-card-actions>
                <v-btn text>Full Report</v-btn>
            </v-card-actions>
        </v-card>
    </v-col>
</template>
<script>
import axios from "axios";
export default {
    props: ['schoolname'],
    data() {
        return {
            message: null,
            loaded: false,
            school: null,
            endpoint: 'api/dev/attendancekpi/' + this.schoolname,
            school: this.schoolname,
        };
    },
    created() {
        this.fetch();
    },
    mounted() {
        console.log("Attendance KPI Mounted.");
    },
    methods: {
        fetch() {
            axios.get(this.endpoint).then(({ data }) => {
                setTimeout(() => this.loaded = true, Math.floor(Math.random() * 1500) + 750);
                // this.loaded = true;
                console.log(data.data);
            });
        },
        roundOff(value, decimals) {
            return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
        }
    }
};
</script>
