require('./bootstrap');
require('moment');

import Vue from 'vue';

import {InertiaApp} from '@inertiajs/inertia-vue';
import {InertiaForm} from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'

Vue.mixin({methods: {route}});
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
