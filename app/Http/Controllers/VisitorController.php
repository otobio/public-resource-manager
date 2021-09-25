<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ResourceCollection;
use App\Models\Resource;

class VisitorController extends Controller
{
    public function __invoke(Request $request)
    {
        $builder = Resource::query();
        if ($request->input('type')) {
            $builder->where('type', $request->input('type'));
        }

        return view(
            'visitor.index',
            [
                'resources' => ResourceCollection::collection($builder->get())->toArray($request)
            ]
        );
    }

    public function download(Resource $resource)
    {
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        $path = $resource->metadata->path;
        return response()
                ->download(storage_path('app/pdfs/' . $path), $path, $headers);
    }
}
