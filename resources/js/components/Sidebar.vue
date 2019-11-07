<template>
	<div class="sidebar">
		<button
			type="button"
			class="btn filters-btn"
			data-toggle="collapse"
			data-target="#filterscollapse"
		>
            <i class="fa fa-gear"></i>&nbsp;Toggle filters
        </button>
		<div id="filterscollapse" class="collapse">
			<div class="filters" id="filters">
				<div class="filter">
					<p>Location</p>
					<form>
						<div class="form-group" v-for="location in locations" :key="location">
							<input type="checkbox" :id="location" v-on:click="checkLocation(location)" />
							<label :for="location">{{location}}</label>
						</div>
					</form>
				</div>

				<div class="filter">
					<p>Company</p>
					<form>
						<div class="form-group" v-for="company in companies" :key="company.id">
							<input type="checkbox" :id="company.id" v-on:click="checkCompany(company.id)" />
							<label :for="company.id">{{company.name}}</label>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<style>
.filters-btn {
    margin: 20px 0;
    cursor: pointer;
}
@media (min-width: 768px) {
    .filters-btn {
        display: none;
    }
	#filterscollapse {
		display: block;
		height: auto !important;
		visibility: visible;
	}
}

@media (max-width: 400px) {
	.filters {
		display: flex;
		justify-content: space-between;
	}
}
.filter p {
	font-weight: 800;
}
.form-group input {
	padding: 0;
	height: initial;
	width: initial;
	margin-bottom: 0;
	display: none;
	cursor: pointer;
}

.form-group label {
	position: relative;
	cursor: pointer;
}

.form-group label:before {
	content: "";
	-webkit-appearance: none;
	background-color: transparent;
	border: 2px solid #2ea1b2;
	box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
		inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
	padding: 10px;
	display: inline-block;
	position: relative;
	vertical-align: middle;
	cursor: pointer;
	margin-right: 5px;
}

.form-group input:checked + label:after {
	content: "";
	display: block;
	position: absolute;
	top: 2px;
	left: 9px;
	width: 6px;
	height: 14px;
	border: solid #0079bf;
	border-width: 0 2px 2px 0;
	transform: rotate(45deg);
}
</style>

<script>
export default {
	props: {
		companies: {
			type: Array,
			required: true
		}
	},
	data: function() {
		return {
			locations: ["Linz", "Vienna", "Innsbruck", "Graz", "Salzburg"],
			selectedLocation: [],
			selectedCompany: []
		};
	},
	mounted() {
		console.log("Component mounted.");
	},
	methods: {
		checkLocation(location) {
			if (!this.selectedLocation.includes(location))
				this.selectedLocation.push(location);
			else this.selectedLocation.pop(location);
			this.$emit("locationfilter", this.selectedLocation);
		},
		checkCompany(id) {
			if (!this.selectedCompany.includes(id)) this.selectedCompany.push(id);
			else this.selectedCompany.pop(id);
			this.$emit("companyfilter", this.selectedCompany);
		}
	}
};
</script>
