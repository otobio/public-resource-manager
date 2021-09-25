import Vue from "vue";
import Dashboard from "./components/Dashboard.vue";

const app = new Vue({
    el: '#app',
    store: require('./store/index').default,
    components: {Dashboard},
    template: '<Dashboard />',
});
