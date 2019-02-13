import Vue from 'vue'

// Register global Vue components
Vue.component('Layout', require('./Misc/Layout').default);

// Register all Async Vue components
require.context('./', true, /\.vue$/i, 'lazy').keys().forEach(file => {
    Vue.component(file.split('/').pop().split('.')[0], () => import(`${file}` /* webpackChunkName: "[request]" */));
});

// Start Turbolinks
require('turbolinks').start()

// Boot the Vue component
document.addEventListener('turbolinks:load', (event) => {
    const root = document.getElementById('app')

    if (window.vue) {
        window.vue.$destroy(true)
    }

    window.vue = new Vue({
        render: h => h(
            Vue.component(root.dataset.component), {
                props: JSON.parse(root.dataset.props)
            }
        )
    }).$mount(root)
})
