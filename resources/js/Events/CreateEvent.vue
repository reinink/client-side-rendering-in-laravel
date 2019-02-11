<template>
    <layout title="Edit Event">
        <h1>Create event</h1>
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
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </layout>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            form: {
                title: null,
                start_date: null,
                description: null,
            }
        }
    },
    methods: {
        submit() {
            axios.post('/events', this.form).then(response => {
                Turbolinks.visit('/events')
            })
        },
    }
}
</script>
