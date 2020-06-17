<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'mdFile' => $this->mdFile,
            'keys' => $this->keys,
            'lang' => $this->lang,
            'viewCount' => $this->views_count,
            'thumbsUps' => $this->thumbs_ups_counts,
            'thumbsDowns' => $this->thumbs_downs_counts,
            'hearts' => $this->hearts_counts,
            'published' =>  $this->published,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
