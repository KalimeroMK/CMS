<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Store;
use App\Http\Requests\Post\Update;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\ImageUpload;
use App\Traits\SlugCreate;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Session;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:post-list');
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    use ImageUpload;
    use SlugCreate;

    /**
     * @return Factory|View
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'asc')->paginate(12);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tag = Tag::all();
        return view('admin.posts.create', compact('categories', 'post', 'tag'));
    }

    /**
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store $request)
    {
        $post = Post::create($request->except('featured_image') + [
                'featured_image' => $this->verifyAndStoreImage($request),
                'slug' => $this->createSlug($request)

            ]);
        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->category);

        Session::flash('success_msg', trans('messages.post_created_success'));
        return redirect()->route('posts.edit', $post);
    }

    /**
     * @param Post $post
     * @return Factory|RedirectResponse|View
     */
    public function edit(Post $post)
    {
        $tag = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tag'));
    }

    /**
     * @param Update $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Update $request, Post $post)
    {
        if ($request->hasFile('featured_image')) {
            $post->update($request->except('featured_image') + [
                    'featured_image' => $this->verifyAndStoreImage($request),
                    'slug' => $this->createSlug($request)
                ]);
        } else {
            $post->update($request->except('featured_image') + [
                    'slug' => $this->createSlug($request)
                ]);
        }
        $post->tags()->sync($request->tags, true);
        $post->categories()->sync($request->category, true);

        Session::flash('error_msg', trans('messages.post_not_found'));
        return redirect()->to(route('posts.edit', $post));
    }


    /**
     * @param Post $post
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success_msg', trans('messages.post_deleted_success'));
        return redirect()->route('posts.index');
    }

    /**
     * Make paths for storing images.
     *
     * @return object
     */
    public function makePaths()
    {
        $original = public_path() . '/uploads/images/posts/';
        $thumbnail = public_path() . '/uploads/images/posts/thumbnails/';
        $medium = public_path() . '/uploads/images/posts/medium/';
        return (object)compact('original', 'thumbnail', 'medium');
    }
}
