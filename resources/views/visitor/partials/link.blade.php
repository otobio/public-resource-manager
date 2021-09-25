<div class="file-box">
    <div class="file">

        <a href="{{ $resource->link }}" {!! $resource->opens === 'Tab' ? 'target="_blank"' : "" !!}>
            <div class="corner"></div>

            <div class="icon">
                <i class="fa fa-link"></i>
            </div>
            <div class="file-name">
                {{ $resource->title }}
                <br>
                <small>{{ $resource->opens }}</small>
            </div>
        </a>
    </div>
</div>
