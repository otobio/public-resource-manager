export default {
    props: {
        resource: {
            type: Object,
            required: true
        }
    },
    methods: {
        deleteResource() {
            if (confirm(`Do you really want to delete ${this.resource.title}`)) {
                this.$store.dispatch("deleteResource", this.resource);
            }
        },

        editResource() {
            this.$store.commit('setCurrentResource', this.resource)
        }
    }
}
