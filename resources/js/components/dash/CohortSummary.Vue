<template>
	<v-col cols="12" lg="4">
		<v-card v-if="! loaded" class="pa-2" outlined raised tile>
			<v-progress-linear indeterminate color="teal"></v-progress-linear>
			<v-card-title class="py-2">Cohort Summary</v-card-title>
			<v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
			<v-divider></v-divider>
			<v-card-actions>
				<v-btn text small disabled>Loading ...</v-btn>
			</v-card-actions>
		</v-card>
		<v-card v-if="loaded" class="pa-2" outlined raised tile>
			<v-card-title class="py-2">Cohort Summary</v-card-title>
			<v-simple-table fixed-header height="345px">
				<template v-slot:default>
					<thead class>
						<tr>
							<th class="grey darken-3 white--text">Group</th>
							<th class="grey darken-3 white--text">Count</th>
							<th class="grey darken-3 white--text">%</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="group in groups" :key="group.sortorder">
							<td>{{ group.Group }}</td>
							<td>{{ group.Count }}</td>
							<td>{{ roundOff(group.percent, 1) }}</td>
						</tr>
					</tbody>
				</template>
			</v-simple-table>
			<v-divider></v-divider>
			<v-card-actions>
				<v-btn text small color="teal darken-1">Action</v-btn>
				<v-btn text small color="teal darken-1">Action</v-btn>
			</v-card-actions>
		</v-card>
	</v-col>
</template>
<script>
import axios from "axios";
export default {
	props: ["schoolname"],
	watch: {
		schoolname: function() {
			this.loaded = false;
			this.endpoint = "api/dev/cohortsummary/" + this.schoolname;
			this.refresh();
		}
	},
	data() {
		return {
			message: null,
			loaded: false,
			school: null,
			endpoint: "api/dev/cohortsummary/" + this.schoolname,
			groups: []
		};
	},
	created() {
		this.fetch();
	},
	mounted() {
		console.log("Cohort Summary Mounted.");
	},
	methods: {
		fetch() {
			axios.get(this.endpoint).then(({ data }) => {
				this.groups = data.data;
				this.loaded = true;
			});
		},
		roundOff(value, decimals) {
			return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
		},
		refresh() {
			this.loaded = false;
			this.fetch();
		},
	}
};
</script>

