<template>
	<div>
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
</template>

<script>
import Base from "../../../utils/base-form-resources";
export default {
    ...Base
};
</script>
