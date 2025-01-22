<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('posts')->get(); // Fetch categories with post counts.

        // filter if category selected
        if ($request->ajax() && $request->has('category_id')) {
            $categoryId = $request->category_id;

            $posts = Post::when($categoryId != 'all', function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })->with(['category', 'user'])->get();

            return response()->json([
                'success' => true,
                'html' => view('frontend.post-list', compact('posts'))->render()
            ]);
        }

        // Show all posts by default
        $posts = Post::with(['category', 'user'])->paginate(5);

        return view('frontend.home', compact('categories', 'posts'));
    } // end of index


    public function postDetail($id){
        $post = Post::with(['comments.replies'])->findOrFail($id);
        return view('frontend.post-detail',compact('post'));
    }

}
