<div class="file-box">
    <div class="file">
        <a href="{{ $resource->link }}">
            <span class="corner"></span>

            <div class="icon">
                <i class="fa fa-file-pdf-o"></i>
            </div>
            <div class="file-name">
                {{ $resource->title }}
                <br>
                <small>{{ $resource->size }}</small>
            </div>
        </a>
    </div>
</div>
