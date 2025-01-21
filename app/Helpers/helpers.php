<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

if(!function_exists('category_by_id')){
    function category_by_id()
    {
       return  Cache::remember('category_by_id', Carbon::now()->addHour(12), function () {
            return DB::table('categories')->get()->keyBy('id')->toArray();
        });

    }
}