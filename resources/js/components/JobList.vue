<template>
	<div>
		<div class="row justify-content-center">
			<div class="offset-md-1 col-md-2 col-sm-12">
				<sidebar
					:companies="companies"
					v-on:locationfilter="locationsRec"
					v-on:companyfilter="companiesRec"
				></sidebar>
			</div>
			<div class="col-md-7  col-sm-12">
				<div class="custom-search-input">
					<div class="input-group">
						<input type="text" class="search-query form-control" placeholder="Search" v-model="jobName" />
						<span class="input-group-btn">
							<button type="button" disabled>
								<span class="fa fa-search"></span>
							</button>
						</span>
					</div>
				</div>
				<span v-if="filteredJobs.length">
                    <h3>{{filteredJobs.length}} Job<span v-if="filteredJobs.length > 1">s</span></h3>
					<Job v-for="job in filteredJobs" :key="job.id" :job="job"></Job>
				</span>
				<span v-if="!filteredJobs.length">
					<h2>No results found.</h2>
				</span>
			</div>
		</div>
	</div>
</template>

<style>
.custom-search-input {
	margin-bottom: 25px;
}
.custom-search-input .search-query {
    margin-right: 22px;
}
.custom-search-input .input-group-btn button {
	padding: 4px 8px 6px 8px;
}
</style>
<script>
import Job from "./Job";

export default {
	props: {
		jobs: {
			type: Array,
			required: true
		},
		companies: {
			type: Array,
			required: true
		}
	},
	data: function() {
		return {
			jobName: "",
			locFilter: [],
			compfilter: []
		};
	},
	computed: {
		filteredJobs: function() {
			let jobs = this.jobs;
			if (this.jobName) {
				//trim and lower case for better search optimization
				let searchQuery = this.jobName.trim().toLowerCase();
				// use indexOf for better search results
				jobs = jobs.filter(
					j =>
						j.title
							.trim()
							.toLowerCase()
							.indexOf(searchQuery) != -1
				);
			}
			if (this.locFilter.length) {
				jobs = jobs.filter(j =>
					this.locFilter.includes(j.location.trim().toLowerCase())
				);
			}
			if (this.compfilter.length) {
				jobs = jobs.filter(j => this.compfilter.includes(j.company_id));
			}
			return jobs;
		}
	},
	methods: {
		locationsRec(value) {
			this.locFilter = value.map(v => v.toLowerCase());
		},
		companiesRec(value) {
			this.compfilter = value;
		}
	},
	components: {
		Job
	}
};
</script>
