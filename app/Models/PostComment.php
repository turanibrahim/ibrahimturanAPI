<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'post_id',
        'reply_to',
        'email',
        'comment',
        'approved'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    /**
     * Get parent comment of the post comment.
     */
    public function parentComment()
    {
        return $this->belongsTo('App\Models\PostComment', 'reply_to', 'id');
    }
}
