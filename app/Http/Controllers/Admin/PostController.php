<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Store;
use App\Http\Requests\Post\Update;
use App\Models\Category;
use App\Models\Language;
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
        $posts = Post::with('category')
            ->orderBy('id', 'asc')
            ->with([
                'language' => function ($query) {
                    $query->where('languages.code', $this->lang());
                }
            ])
            ->paginate(12);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $languages = Language::all();
        $tag = Tag::all();
        return view('admin.posts.create', compact('categories', 'post', 'tag', 'languages'));
    }

    /**
     * @param  Store  $request
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
    {
        $post = Post::create(
            $request->except('featured_image', 'title', 'description') + [
                'featured_image' => $this->verifyAndStoreImage($request),
                'slug' => $this->createSlug($request)
            ]
        );
        $post->language()->attach($this->pivotData($request));
        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->category);

        Session::flash('success_msg', trans('messages.post_created_success'));
        return redirect()->route('posts.edit', $post);
    }

    /**
     * @param  Post  $post
     * @return Factory|RedirectResponse|View
     */
    public function edit(Post $post)
    {
        $tag = Tag::all();
        $languages = Language::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tag', 'languages'));
    }

    /**
     * @param  Update  $request
     * @param  Post    $post
     * @return RedirectResponse
     */
    public function update(Update $request, Post $post): RedirectResponse
    {
        if ($request->hasFile('featured_image',)) {
            $post->update(
                $request->except('featured_image', 'title', 'description') + [
                    'featured_image' => $this->verifyAndStoreImage($request),
                ]
            );
        } else {
            $post->update($request->except('title', 'description'));
        }

        $post->language()->sync($this->pivotData($request), true);
        $post->tags()->sync($request->tags, true);
        $post->categories()->sync($request->category, true);

        Session::flash('error_msg', trans('messages.post_not_found'));
        return redirect()->route('posts.edit', $post);
    }


    /**
     * @param  Post  $post
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        Session::flash('success_msg', trans('messages.post_deleted_success'));
        return redirect()->route('posts.index');
    }

    /**
     * @param $request
     * @return array
     */
    public function pivotData($request)
    {
        $sync_data = [];
        for ($i = 0, $iMax = count($request['title']); $i < $iMax; $i++) {
            $sync_data[$request['title'][$i]] = [
                'title' => $request['title'][$i],
                'description' => $request['description'][$i],
                'language_id' => $request['language_id'][$i],
            ];
        }
        return $sync_data;
    }

    /**
     * Make paths for storing images.
     *
     * @return object
     */
    public function makePaths()
    {
        $original = public_path().'/uploads/images/posts/';
        $thumbnail = public_path().'/uploads/images/posts/thumbnails/';
        $medium = public_path().'/uploads/images/posts/medium/';
        return (object)compact('original', 'thumbnail', 'medium');
    }
}
