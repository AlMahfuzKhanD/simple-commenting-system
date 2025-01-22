<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'created_by',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function($category){
            // Check if the category has related posts
            if($category->posts()->exists()){
                throw new \Exception('Category can not be deleted, It has related posts.');
            }
        });
    }
}
