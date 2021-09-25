<template>
	<div v-if="resource.type === 'pdf'">
		<div class="file-box">
			<div class="file">
				<div class="hover">
					<div class="btn-group" role="group">
						<button
							@click="editResource"
							type="button"
							class="btn btn-icon btn-sm btn-info"
						>
							<i class="fa fa-edit"></i>
						</button>
						<button
							@click="deleteResource"
							type="button"
							class="btn btn-icon btn-sm btn-danger"
						>
							<i class="fa fa-trash"></i>
						</button>
					</div>
				</div>

				<span class="corner"></span>

				<div class="icon">
					<i class="fa fa-file-pdf-o"></i>
				</div>
				<div class="file-name">
					{{ resource.title }}
					<br />
					<small v-text="resource.size"></small>
				</div>
			</div>
		</div>
	</div>

	<div v-else-if="resource.type === 'link'">
		<div class="file-box">
			<div class="file">
				<div class="hover">
					<div class="btn-group" role="group">
						<button
							@click="editResource"
							type="button"
							class="btn btn-icon btn-sm btn-info"
						>
							<i class="fa fa-edit"></i>
						</button>
						<button
							@click="deleteResource"
							type="button"
							class="btn btn-icon btn-sm btn-danger"
						>
							<i class="fa fa-trash"></i>
						</button>
					</div>
				</div>

				<div class="corner"></div>

				<div class="icon">
					<i class="fa fa-link"></i>
				</div>
				<div class="file-name">
					{{ resource.title }}
					<br />
					<small v-text="resource.opens"></small>
				</div>
			</div>
		</div>
	</div>

	<div v-else-if="resource.type === 'snippet'">
		<div class="file-box">
			<div class="file">
				<div class="hover">
					<div class="btn-group" role="group">
						<button
							@click="editResource"
							type="button"
							class="btn btn-icon btn-sm btn-info"
						>
							<i class="fa fa-edit"></i>
						</button>
						<button
							@click="deleteResource"
							type="button"
							class="btn btn-icon btn-sm btn-danger"
						>
							<i class="fa fa-trash"></i>
						</button>
					</div>
				</div>

				<span class="corner"></span>

				<div class="icon">
					<i class="fa fa-file-code-o"></i>
				</div>
				<div class="file-name">
					{{ resource.title }}
					<br />
					<div
						class="text-truncate"
						:title="resource.description"
						v-text="resource.description"
					></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
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
</script>
