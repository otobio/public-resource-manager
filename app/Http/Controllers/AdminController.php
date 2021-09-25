<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreResourceRequest;
use App\Models\Resource;
use App\Http\Resources\ResourceCollection;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = Resource::query();
        if ($request->input('type')) {
            $builder->where('type', $request->input('type'));
        }

        return ResourceCollection::collection($builder->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourceRequest $request)
    {
        $input = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'metadata' => Arr::except($request->validated(), ['name', 'type']),
        ];

        if ($request->input('type') === 'pdf') {
            $file = $request->file('file');
            $input['metadata'] += [
                'size' => $file->getSize(),
                'ext' => $file->getClientOriginalExtension(),
                'path' => $file->getClientOriginalName(),
            ];
        }

        if (Resource::create($input)) {
            if (isset($file)) {
                $file->move(storage_path('app/pdfs'), $file->getClientOriginalName());
            }

            return response()->json(['ok' => true]);
        } else {
            return response()->json(['ok' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResourceRequest $request, $id)
    {
        $input = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'metadata' => Arr::except($request->validated(), ['name', 'type']),
        ];

        if ($request->input('type') === 'pdf') {
            $file = $request->file('file');
            $input['metadata'] += [
                'size' => $file->getSize(),
                'ext' => $file->getClientOriginalExtension(),
                'path' => $file->getClientOriginalName(),
            ];
        }

        $resource = Resource::find($id);
        if ($resource && $resource->update($input)) {
            if (isset($file)) {
                $file->move(storage_path('app/pdfs'), $file->getClientOriginalName());
            }

            return response()->json(['ok' => true]);
        } else {
            return response()->json(['ok' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Resource::find($id);

        if ($resource->delete()) {
            return response()->json(['ok' => true]);
        } else {
            return response()->json(['ok' => false]);
        }
    }
}
