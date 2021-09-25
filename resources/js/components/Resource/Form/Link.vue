<template>
	<div>
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
					<span class="input-group-text">Full address</span>
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
                    :checked="resource.opens === 'Opens in Tab'"
					:value="1"
				/>
				<span class="custom-control-label" for="open_in_tab"
					>Open in a new tab</span
				>
			</label>
		</div>
	</div>
</template>

<script>
import Base from "../../../utils/base-form-resources";
export default {
    ...Base
};
</script>
