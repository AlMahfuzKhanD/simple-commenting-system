<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'reply' => ['required','string']
            ]);

            $reply = Reply::insert([
                'comment_id' => $request->comment_id,
                'reply' => $request->reply,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            DB::commit();
            // return response()->json(['success'=>'Comment submitted Successfully','data' => $data]);
            return response()->json([
                'success' => true,
                'message' => 'Reply added successfully!',
                'data' => $reply
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage();
            return response()->json(['error'=>$message]);
        }
    } // end of addReply
}
