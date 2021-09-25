export default {
    setResources(state, resources) {
        state.resources = resources;
    },
    dropResource(state, resource) {
        const index = state.resources.indexOf(resource)
        if (index > -1) {
            state.resources.splice(index, 1);
        }
    },
    setCurrentResource(state, resource) {
        state.ui.currentResource = resource;
    }
}
