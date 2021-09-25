<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $item = $this->resource;

        switch ($item->type) {
            case 'pdf':
            return [
                'id' => $item->id,
                'type' => 'pdf',
                'title' => $item->name,
                'size' => $this->formatBytes($item->metadata->size),
                'link' => route('visitor.download.resource', $item->id),
                'path' => $item->metadata->path,
            ];

            case 'link':
            return [
                'id' => $item->id,
                'type' => 'link',
                'title' => $item->name,
                'opens' => data_get($item, 'metadata.open_in_tab') ? 'Opens in Tab' : 'Opens in Page',
                'link' => $item->metadata->link,
            ];

            case 'snippet':
            return [
                'id' => $item->id,
                'type' => 'snippet',
                'title' => $item->name,
                'description' => $item->metadata->description,
                'snippet' => $item->metadata->snippet,
                'link' => '',
            ];

            default:
                return [];
        }
    }

    private function formatBytes($bytes) {
        if ($bytes > 0) {
            $i = floor(log($bytes) / log(1024));
            $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            return sprintf('%.02F', round($bytes / pow(1024, $i),1)) * 1 . ' ' . @$sizes[$i];
        } else {
            return 0;
        }
    }
}
