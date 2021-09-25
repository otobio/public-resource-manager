<div class="file-box">
    <div class="file">
        <a href="#">
                <div class="hover">
                    <div class="btn-group" role="group">
                        <button
                            title="click to copy snippet"
                            type="button"
                            data-copy-text="{{ $resource->snippet }}"
                            class="btn btn-icon btn-sm btn-info copy"
                        >
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>
            <span class="corner"></span>

            <div class="icon">
                <i class="fa fa-file-code-o"></i>
            </div>
            <div class="file-name">
                {{ $resource->title }}
                <br>
                <div class="text-truncate" title="{{ $resource->description }}">{{ $resource->description }}</div>
            </div>
        </a>
    </div>
</div>
