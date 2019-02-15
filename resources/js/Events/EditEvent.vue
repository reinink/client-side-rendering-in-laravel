<template>
    <layout title="Edit Event">
        <h1>Edit event</h1>
        <form class="mt-4" @submit.prevent="submit" style="max-width: 500px;">
            <div class="form-group">
                <label>Title:</label>
                <input class="form-control" type="text" v-model="form.title">
                <div class="text-danger" v-if="errors.has('title')">
                    {{ errors.first('title') }}
                </div>
            </div>
            <div class="form-group">
                <label>Start date:</label>
                <input class="form-control" type="date" v-model="form.start_date">
                <div class="text-danger" v-if="errors.has('start_date')">
                    {{ errors.first('start_date') }}
                </div>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" rows="5" v-model="form.description"></textarea>
                <div class="text-danger" v-if="errors.has('description')">
                    {{ errors.first('description') }}
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Save Changes</button>
        </form>
    </layout>
</template>

<script>
import axios from 'axios'
import { Errors } from 'form-backend-validation';

export default {
    props: ['event'],
    data() {
        return {
            form: {
                title: this.event.title,
                start_date: this.event.start_date,
                description: this.event.description,
            },
            errors: new Errors(),
        }
    },
    methods: {
        submit() {
            axios.put(`/events/${this.event.id}`, this.form).then(() => {
                Turbolinks.visit(`/events/${this.event.id}`)
            }).catch((error) => {
                this.errors = new Errors(error.response.data.errors)
            });
        },
    }
}
</script>
