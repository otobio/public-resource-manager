<template>
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
</template>

<script>
import Base from "../../../utils/base-view-resources";
export default {
    ...Base
};
</script>
