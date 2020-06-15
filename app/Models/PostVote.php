<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'ip_address',
        'vote_type'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
