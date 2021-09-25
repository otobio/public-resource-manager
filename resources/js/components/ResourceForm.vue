<template>
	<div
		class="modal fade show"
		style="display: block;"
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
						<div v-if="resource.type === 'pdf'">
							<input type="hidden" name="type" value="pdf" />

							<div class="form-group">
								<label for="name">Title</label>
								<input
									required
									type="text"
									name="name"
									class="form-control"
									placeholder=""
									:value="resource.title"
								/>
							</div>

							<div class="form-group">
								<label for="link">File</label>
								<div class="custom-file">
									<input
										required
										type="file"
										class="custom-file-input"
										name="file"
									/>
									<label
										class="custom-file-label"
										for="customFile"
										>Choose file</label
									>
								</div>
							</div>
						</div>

						<div v-else-if="resource.type === 'link'">
							<input type="hidden" name="type" value="link" />

							<div class="form-group">
								<label for="name">Title</label>
								<input
									required
									type="text"
									name="name"
									class="form-control"
									placeholder=""
									:value="resource.title"
								/>
							</div>

							<div class="form-group">
								<label for="link">Link</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"
											>Full address</span
										>
									</div>
									<input
										required
										type="url"
										name="link"
										class="form-control"
										:value="resource.link"
									/>
								</div>
							</div>

							<div class="form-group">
								<label class="custom-control custom-checkbox">
									<input
										type="checkbox"
										class="custom-control-input"
										name="open_in_tab"
										value="1"
									/>
									<span
										class="custom-control-label"
										for="open_in_tab"
										>Open in a new tab</span
									>
								</label>
							</div>
						</div>

						<div v-else-if="resource.type === 'snippet'">
							<input type="hidden" name="type" value="snippet" />

							<div class="form-group">
								<label for="name">Title</label>
								<input
									required
									type="text"
									name="name"
									class="form-control"
									placeholder=""
									:value="resource.title"
								/>
							</div>

							<div class="form-group">
								<label for="name">Description</label>
								<textarea
									class="form-control"
									name="description"
									required
									placeholder=""
									:value="resource.description"
								></textarea>
							</div>

							<div class="form-group">
								<label for="name">Snippet</label>
								<textarea
									required
									class="form-control"
									name="snippet"
									placeholder="<write-your-snippet-here></write-your-snippet-here>"
									:value="resource.snippet"
								></textarea>
							</div>
						</div>
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
    export default {
        props: {
            resource: {
                type: Object,
                required: false
            }
        },
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
