<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'mdFile',
        'readCount',
        'keys',
        'lang',
        'published'
    ];

    /**
     * Get the views for the blog post.
     */
    public function views()
    {
        return $this->hasMany('App\Models\PostView');
    }

    /**
     * Get the views for the blog post.
     */
    public function votes()
    {
        return $this->hasMany('App\Models\PostVote');
    }
}
