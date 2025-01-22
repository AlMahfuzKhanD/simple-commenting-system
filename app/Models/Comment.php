<?php

namespace App\Models;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'comment',
        'created_by',
    ];

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($comment) {
            // Delete all related replies
            $comment->replies()->delete();
        });
    }

}
