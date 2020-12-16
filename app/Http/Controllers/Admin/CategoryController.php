<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Session;

class CategoryController extends Controller
{

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:categories-list');
        $this->middleware('permission:categories-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:categories-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::getTree();
        if (is_null($categories)) {
            return redirect()->route('categories.create');
        }
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::getTree();
        $category = new Category();
        return view('admin.categories.create', compact('categories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
    {
        if (!is_null($request->parent_id)) {
            $category = Category::create(["parent_id" => $request->parent_id]);
            Session::flash('flash_message', 'Category successfully created!');
            return redirect()->route('categories.edit', $category);
        }
        $category = Category::create($request->all());
        Session::flash('flash_message', 'Category successfully created!');
        return redirect()->route('categories.edit', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        $categories = Category::getTree();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Update $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Update $request, Category $category): RedirectResponse
    {
        $category->update($request->all());
        Session::flash('flash_message', 'Category successfully created!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        Session::flash('flash_message', 'Category successfully deleted!');
        return redirect()->route('categories.index');
    }
}
