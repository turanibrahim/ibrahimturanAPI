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
            'viewCount' => $this->view_count,
            'thumbsUps' => $this->thumbs_ups,
            'thumbsDowns' => $this->thumbs_downs,
            'hearts' => $this->hearts,
            'published' =>  $this->published,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
