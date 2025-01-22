<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['categories'] = Category::withCount('posts')->get();
        $data['posts'] = Post::paginate(5);
        // dd($posts);
        return view('frontend.home',compact('data'));
    } // end of index

    public function postDetail($id){
        $post = Post::with(['comments.replies'])->findOrFail($id);
        return view('frontend.post-detail',compact('post'));
    }
}
