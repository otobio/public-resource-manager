<template>
	<div v-if="resources.length" class="resource-manager">
		<resource-item
			v-for="resource of resources"
			:key="resource.id"
			:resource="resource"
		>
		</resource-item>
	</div>
	<div v-else>No resources found</div>
</template>

<script>
import ResourceItem from './ResourceItem.vue'
import { mapState } from 'vuex'

export default {
	components: { ResourceItem },
    computed : {
        ...mapState({
            resources: state => state.resources
        })
    }
}
</script>
