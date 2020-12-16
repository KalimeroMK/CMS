<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\Store;
use App\Models\PostTag;
use App\Models\Tag;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Request;
use Session;

class TagController extends Controller
{
    /**
     * TagController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:tags-list');
        $this->middleware('permission:tags-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tags-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tags-delete', ['only' => ['destroy']]);
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'asc')->paginate(10);
        foreach ($tags as $t) {
            $t->post_count = PostTag::where('tag_id', $t->id)->count();
        }
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * @return Application|Factory
     */
    public function create()
    {
        $tag = new Tag();
        return view('admin.tags.create', compact('tag'));
    }

    /**
     * @param Store $request
     * @return string
     */
    public function store(Store $request): string
    {
        Tag::create($request->all());
        return redirect()->route('tags.index');
    }

    /**
     * @param Tag $tag
     * @return string
     * @throws Exception
     */
    /**
     * @param Tag $tag
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * @param Request $request
     * @param Tag $tag
     * @return RedirectResponse]
     */
    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->all());
        return redirect()->route('tags.edit', $tag);
    }

    public function destroy(Tag $tag): string
    {
        $tag->posts()->detach();
        $tag->delete();
        Session::flash('success_msg', trans('messages.tag_deleted_success'));
        return redirect()->back();
    }
}
