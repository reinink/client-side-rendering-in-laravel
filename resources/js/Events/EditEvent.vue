<template>
    <layout title="Edit Event">
        <h1>Edit event</h1>
        <form class="mt-4" @submit.prevent="submit" style="max-width: 500px;">
            <div class="form-group">
                <label>Title:</label>
                <input class="form-control" type="text" v-model="form.title">
            </div>
            <div class="form-group">
                <label>Start date:</label>
                <input class="form-control" type="date" v-model="form.start_date">
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" rows="5" v-model="form.description"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Save Changes</button>
        </form>
    </layout>
</template>

<script>
import axios from 'axios'

export default {
    props: ['event'],
    data() {
        return {
            form: {
                title: this.event.title,
                start_date: this.event.start_date,
                description: this.event.description,
            }
        }
    },
    methods: {
        submit() {
            axios.put(`/events/${this.event.id}`, this.form).then(() => {
                Turbolinks.visit(`/events/${this.event.id}`)
            })
        },
    }
}
</script>
