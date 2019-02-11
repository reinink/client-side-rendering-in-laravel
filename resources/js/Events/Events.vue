<template>
    <layout title="Events">
        <h1>Events</h1>
        <ul class="mt-5">
            <li v-for="event in events">
                <a :href="`/events/${event.id}`">{{ event.title }}</a> <span>({{ event.start_date }})</span>
            </li>
        </ul>
        <div class="mt-5">
            <a class="btn btn-primary" href="/events/create">Create event</a>
        </div>
    </layout>
</template>

<script>
export default {
    props: ['events'],
}
</script>
