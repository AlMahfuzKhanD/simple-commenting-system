<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
}
