<template>
	<div class="container">
		<div class="view-account">
			<section class="module">
				<div class="module-inner">
					<div class="content-panel">
						<div class="content-header-wrapper">
							<h2 class="title">Public Resource Drive</h2>
						</div>

						<div class="content-utilities">
							<div class="actions">
								<div class="btn-group">
									<button
										class="btn btn-default dropdown-toggle"
										data-toggle="dropdown"
										type="button"
										aria-expanded="false"
									>
										All <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li>
											<button
												type="button"
												@click="filterResource(null)"
												class="dropdown-item"
											>
												All
											</button>
										</li>
										<li>
											<button
												type="button"
												@click="filterResource('pdf')"
												class="dropdown-item"
											>
												<i class="fa fa-file"></i> Pdfs
											</button>
										</li>
										<li>
											<button
												type="button"
												@click="
													filterResource('snippet')
												"
												class="dropdown-item"
											>
												<i
													class="fa fa-file-image-o"
												></i>
												Snippets
											</button>
										</li>
										<li>
											<button
												type="button"
												@click="filterResource('link')"
												class="dropdown-item"
											>
												<i
													class="fa fa-file-video-o"
												></i>
												Links
											</button>
										</li>
									</ul>
								</div>

								<div class="pull-right">
									<button
										class="btn btn-success dropdown-toggle"
										data-toggle="dropdown"
										type="button"
										aria-expanded="false"
									>
										<i class="fa fa-plus"></i> Add Resource
									</button>
									<ul
										class="dropdown-menu"
										aria-labelledby="new-dropdown"
									>
										<li>
											<button
												type="button"
												@click="createResource('pdf')"
												class="dropdown-item"
											>
												<i class="fa fa-file"></i> Pdf
											</button>
										</li>
										<li>
											<button
												type="button"
												@click="
													createResource('snippet')
												"
												class="dropdown-item"
											>
												<i
													class="fa fa-file-image-o"
												></i>
												Snippet
											</button>
										</li>
										<li>
											<button
												type="button"
												@click="createResource('link')"
												class="dropdown-item"
											>
												<i
													class="fa fa-file-video-o"
												></i>
												Link
											</button>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="drive-wrapper drive-grid-view">
							<div class="grid-items-wrapper">
								<resources></resources>
								<resource-form
									v-if="currentResource !== null"
									:resource="currentResource"
								></resource-form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</template>

<script>
import Resources from './Resources.vue'
import ResourceForm from './ResourceForm.vue'
import { mapState } from 'vuex'

    export default {
    	components: { Resources, ResourceForm },
        computed: {
            ...mapState({
                currentResource: state => state.ui.currentResource
            })
        },
        created() {
            this.$store.dispatch('pullResources')
        },
        methods: {
            createResource(type) {
                this.$store.commit('setCurrentResource', {"type": type});
            },

            filterResource(type) {
                if (type) {
                    this.$store.dispatch('pullResources', {type: type})
                } else {
                    this.$store.dispatch('pullResources')
                }
            }
        }
    }
</script>
