<template>
    <div class="container">
        <nav class="my-5">
            <a class="mr-3" href="/">Dashboard</a>
            <a href="/events">Events</a>
        </nav>
        <main>
            <slot></slot>
        </main>
    </div>
</template>

<script>
export default {
    props: ['title'],
    mounted() {
        this.updatePageTitle(this.title)
    },
    watch: {
        title(title) {
            this.updatePageTitle(title)
        }
    },
    methods: {
        updatePageTitle(title) {
            document.title = title ? `${title} | Example app` : `Example app`
        }
    },
}
</script>
