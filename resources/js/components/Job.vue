<template>
    <div class="job">
        <h2 class="job-title">{{job.title}}</h2>
        <p class="publish-info">
            <span class="badge badge-pill badge-info" v-if="job.active">Available</span>
            <span class="badge badge-pill badge-secondary" v-if="!job.active">Not available</span>
            {{job.published_at.split(' ')[0]}},&nbsp;{{job.location}}
        </p>
        <p class="description">
            {{job.description}}
        </p>
    </div>
</template>

<style>
    .job {
        margin-bottom: 15px;
        background-color: #f8fafc;
        padding: 15px;
    }
    .job-title,
    .publish-info {
        margin-bottom: 0;
        line-height: 0.9;
    }
    .publish-info {
        margin-top: 5px;
    }
    .badge.badge-pill {
        color: white
    }
    .description {
        margin-top: 5px;
        font-size: 1.2em;
    }
    
</style>

<script>
    export default {
        props: {
            job: {
                type: Object,
                required: true
            }
        },
        mounted() {
            console.log('Job component mounted.')
        }
    }
</script>
