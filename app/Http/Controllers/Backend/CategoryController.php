<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.category.categories',compact('categories'));
    } // end of index

    public function create(){
        return view('backend.category.create');
    } // end of create

    public function store(Request $request){

        // dd($request->all());
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'category_name' => ['required','string']
            ]);

            $review = Category::insert([
                'category_name' => $request->category_name,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Category Created Successfully!!',
                'alert-type' => 'success'
            );

            DB::commit();
            return redirect()->route('categories')->with($notification);
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
}
