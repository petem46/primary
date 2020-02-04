<template>
    <v-col cols="6" md="3">
        <v-card class="pa-2" outlined raised tile>
            <v-row>
                <v-col cols="4" class="py-0">
                <v-icon size="50" color="teal lighten-2">mdi-account-group</v-icon>
                </v-col>
            <v-col cols="8" class="text-right py-0">
                <div class="overline">pupils</div>
                <h3 v-if="! loaded" class="pa-0 text-right display-1"><i class="fas fa-spinner fa-spin"></i></h3>
                <h3 v-if="loaded" class="pa-0 text-right display-1">
                    {{ norcount }}
                </h3>
            </v-col>
            <v-col cols="12" class="py-0">
                <hr class="ma-1 grey--text text--lighten-4">
                <div class="text-right teal--text text--lighten-2"><small>{{ school }} number on roll</small></div>
            </v-col>
            </v-row>
        </v-card>
    </v-col>
</template>
<script>
    import axios from 'axios';
    export default {
        props: ['schoolname'],
        data: function() {
            return {
                message: null,
                loaded: false,
                endpoint: 'api/dev/norkpi',
                norcount: this.count,
                school: this.schoolname,
            };
        },
        created() {
            this.fetch();
        },
        mounted() {
            console.log('Number On Roll Mounted.')
            console.log(this.schoolName);
        },
        methods: {
            fetch() {
                axios.get(this.endpoint)
                .then(({data}) => {
                    this.norcount = data.data[0].Count;
                    // setTimeout(() => this.loaded = true, 1500);
                    this.loaded = true;
                    console.log(data.data);
                    console.log(this.schoolname);
                });
            }
        }
    }

</script>
