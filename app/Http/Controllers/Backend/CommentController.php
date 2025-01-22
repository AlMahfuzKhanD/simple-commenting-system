<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'comment' => ['required','string']
            ]);

            $comment = Comment::insert([
                'post_id' => $request->post_id,
                'comment' => $request->comment,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            DB::commit();
            // return response()->json(['success'=>'Comment submitted Successfully','data' => $data]);
            return response()->json([
                'success' => true,
                'message' => 'Comment added successfully!',
                'data' => $comment
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage();
            return response()->json(['error'=>$message]);
        }
    } // end of store

    public function update(Request $request){
        $comment_id = $request->comment_id;

        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'comment' => ['required','string']
            ]);          

            $comment = Comment::where('id',$comment_id)
            ->update([
                'comment' => $request->comment,
            ]);
            

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Comment Updated successfully!',
                'data' => $comment
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
                $message = $e->getMessage();
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    } // end of update
}
