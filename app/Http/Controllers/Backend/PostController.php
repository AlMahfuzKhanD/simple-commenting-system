<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('backend.post.posts',compact('posts'));
    } // end of index

    public function create(){
        $categories = category_by_id();
        return view('backend.post.create',compact('categories'));
    } // end of create

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'title' => ['required','string'],
                'description' => ['required','string'],
            ]);

            $review = Post::insert([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Post Created Successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('posts')->with($notification);
        } catch (\Exception $e) {

            DB::rollback();
                $message = $e->getMessage();
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    } // end of store

    public function edit($id){
        $post = Post::where('id',$id)->first();
        $categories = category_by_id();
        return view('backend.post.edit',compact('post','categories'));
    } //  end of edit

    public function update(Request $request){
        $post_id = $request->post_id;

        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'title' => ['required','string'],
                'description' => ['required','string'],
            ]);            

            Post::where('id',$post_id)
            ->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            

            $notification = array(
                'message' => 'Post Updated Successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('posts')->with($notification);
        } catch (\Exception $e) {

            DB::rollback();
                $message = $e->getMessage();
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    } // end of update

    public function delete($id){
        DB::beginTransaction();
        try {
            $post = Post::findOrFail($id);
            $post->delete();            
            $notification = array(
                'message' => 'Post deleted successfully!!',
                'alert-type' => 'error'
            );

            DB::commit();
            return redirect()->route('posts')->with($notification);
        } catch (\Exception $e) {

            DB::rollback();
                $message = $e->getMessage();
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    } // end of delete
}
