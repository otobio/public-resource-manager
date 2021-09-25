<template>
	<div v-if="resources.length" class="resource-manager">
		<component
			v-for="resource of resources"
            :is="`resource-view-${resource.type}`"
			:key="resource.id"
			:resource="resource"
		>
		</component>
	</div>
	<div class="px-3 pt-3" v-else>No resources found</div>
</template>

<script>

import ResourceViewPdf from "./Resource/View/Pdf.vue"
import ResourceViewLink from "./Resource/View/Link.vue"
import ResourceViewSnippet from "./Resource/View/Snippet.vue"

import { mapState } from 'vuex'

export default {
	components: { ResourceViewPdf, ResourceViewLink, ResourceViewSnippet },
    computed : {
        ...mapState({
            resources: state => state.resources
        })
    }
}
</script>
