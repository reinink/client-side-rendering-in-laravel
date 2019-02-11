<template>
    <layout :title="event.title">
        <h1>{{ event.title }}</h1>
        <div class="mt-4">{{ event.start_date }}</div>
        <div class="mt-4">{{ event.description }}</div>
        <div class="mt-4">
            <a class="btn btn-primary" :href="`/events/${event.id}/edit`">Edit</a>
            <button @click="destroy" type="button" class="btn btn-outline-danger">Delete</button>
        </div>
    </layout>
</template>

<script>
import axios from 'axios'

export default {
    props: ['event'],
    methods: {
        destroy() {
            if (confirm('Are you sure you want to delete this event?')) {
                axios.delete(`/events/${this.event.id}`).then(() => {
                    Turbolinks.visit('/events')
                })
            }
        },
    }
}
</script>
