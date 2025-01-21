<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['categories'] = Category::withCount('posts')->get();
        $posts = Post::paginate(5);
        // dd($posts);
        return view('frontend.home',compact('data','posts'));
    } // end of index

    public function postDetail($id){
        dd($id);
    }
}
