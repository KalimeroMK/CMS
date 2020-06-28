<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $tree = Category::getList();
        $tag = Tag::get();
        $slider_post = Post::orderBy('id', 'desc')->where('status', '1')->paginate(15);
        $popular_post = Post::orderBy('views', 'desc')->where('status', config('constants.STATUS_PUBLISHED'))->take(5)->get();
        $ads = Ad::all();

        View::share([
            'tree' => $tree,
            'ads' => $ads,
            'tag' => $tag,
            'popular_post' => $popular_post,
            'slider_post' => $slider_post
        ]);
    }

    /**
     * @return ResponseFactory|Response
     */
    public function throw404()
    {
        return response(view('errors.404'));
    }

    /**
     * @return ResponseFactory|Response
     */
    public function show403()
    {
        return response(view('errors.403'));
    }

    /**
     * @return ResponseFactory|Response
     */
    public function show404()
    {
        return response(view('errors.404'));
    }

    /**
     * @return ResponseFactory|Response
     */
    public function show500()
    {
        return response(view('errors.500'));
    }

    /**
     * @return ResponseFactory|Response
     */
    public function show503()
    {
        return response(view('errors.503'));
    }
}
