<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Source;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {

        $posts_count = Post::count();
        $users_count = User::count();
        $categories = Category::count();
        $posts = Post::whereStatus(1)->limit(5)->get();
        return view('admin.index', compact('posts_count', 'users_count', 'categories', 'posts'));
    }
}
