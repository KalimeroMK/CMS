<?php


namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait SlugCreate
{
    public function createSlug(Request $request)
    {
        return Str::slug($request->title, '-');
    }

}