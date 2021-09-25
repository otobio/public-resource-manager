<template>
	<div
		class="modal fade show"
		style="display: block"
		tabindex="-1"
		v-if="resource !== null"
	>
		<form ref="resourceForm" @submit.prevent="save">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" v-if="resource.id">Edit</h5>
						<h5 class="modal-title" v-else>New</h5>

						<button
							type="button"
							@click="close"
							class="close"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<input
						v-if="resource.id"
						type="hidden"
						name="id"
						:value="resource.id"
					/>

					<div class="modal-body">
						<component
							:is="`resource-form-${resource.type}`"
							:resource="resource"
						>
						</component>
					</div>

					<div class="modal-footer">
						<button
							type="button"
							class="btn btn-secondary"
							@click="close"
							data-dismiss="modal"
						>
							Close
						</button>
						<button type="submit" class="btn btn-primary">
							Save
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
import ResourceFormPdf from "./Resource/Form/Pdf.vue"
import ResourceFormLink from "./Resource/Form/Link.vue"
import ResourceFormSnippet from "./Resource/Form/Snippet.vue"
import Base from "../utils/base-form-resources";

    export default {
        ...Base,
        components: { ResourceFormPdf, ResourceFormLink, ResourceFormSnippet },
        methods: {
            close() {
                this.$store.commit("setCurrentResource", null)
            },
            save() {
                const formData = new FormData(this.$refs.resourceForm);
                this.$store.dispatch("saveResource", formData);
            }
        }
    }
</script>
