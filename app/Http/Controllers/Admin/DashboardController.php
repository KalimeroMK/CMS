<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Source;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * CronController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $posts_count = Post::count();
        $users_count = User::count();

        return view('admin.index', compact('posts_count', 'users_count'));
    }
}
