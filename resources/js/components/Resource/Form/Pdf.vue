<template>
	<div>
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
				<label class="custom-file-label" for="customFile"
					>Choose file</label
				>
			</div>
		</div>
	</div>
</template>

<script>
import Base from "../../../utils/base-form-resources";
export default {
    ...Base
};
</script>
