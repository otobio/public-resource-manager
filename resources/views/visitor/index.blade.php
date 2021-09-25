<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/visitor.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Public Drive</title>
</head>
<body class="antialiased">

    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">

                    <div class="content-panel">
                        <div class="content-header-wrapper">
                            <h2 class="title">Public Resource Drive <a class="" href="{{ route('admin.dashboard') }}"><i class="fa fa-pencil"></i></a></h2>
                        </div>
                        <div class="content-utilities">
                            <div class="actions">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">{{ !request('type') ? "All" : ucfirst(Str::plural(request('type'))) }} <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('visitor.home') }}"> All</a></li>
                                        <li><a class="dropdown-item" href="{{ route('visitor.home', ['type' => 'pdf']) }}"><i class="fa fa-file-pdf-o"></i> Pdfs</a></li>
                                        <li><a class="dropdown-item" href="{{ route('visitor.home', ['type' => 'snippet']) }}"><i class="fa fa-file-code-o"></i> Snippets</a></li>
                                        <li><a class="dropdown-item" href="{{ route('visitor.home', ['type' => 'link']) }}"><i class="fa fa-link"></i> Links</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="drive-wrapper drive-grid-view">
                            <div class="grid-items-wrapper">

                                @forelse ((object)$resources as $resource)
                                    @php($resource = (object) $resource)

                                    @includeIf("visitor.partials.{$resource->type}", [
                                        'resource' => $resource,
                                    ])

                                @empty
                                    <div>No resources found</div>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    @include('partials.footer')

    <script src="/js/bootstrap.js"></script>
    <script src="/js/visitor.js"></script>
</body>
</html>
