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

    /**
     * Get the comments for the blog post.
     */
    public function postComments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePosts($query, $search = "")
    {
        return $query->withCount(['views',
            'votes as thumbs_ups_counts' => function ($query) {
                $query->where('vote_type', 1);
            },
            'votes as thumbs_downs_counts' => function ($query) {
                $query->where('vote_type', 2);
            },
            'votes as hearts_counts' => function ($query) {
                $query->where('vote_type', 3);
            }])
            ->where(function ($query)  use ($search) {
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->orWhere('keys', 'like', '%'.$search.'%');
            })
            ->where('published', '=', true);
    }
}
