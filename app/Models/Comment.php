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
}
