<?php


namespace App\Services;

use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class CategoryService
{
    public function index()
    {
        $categories = Category::roots()->get();
        return Category::getTree($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Category[]|Collection
     */
    public function create()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     *
     * @return void
     */
    public function store(Store $request)
    {
        $request['slug'] = str_slug($request['name']);
        $slug = Category::where('title', $request['title'])->get();
        if ($slug) {
            $request['slug'] = $request['slug'] . '-' . count($slug);
        }

        $input = $request->all();

        if ($input['parent_id'] == "null") {
            if ($request->hasFile('image')) {
                $root = Category::create(['title' => $input['title'], 'slug' => $input['slug'], 'decription' => $input['description']]);
            } else {
                $root = Category::create(['title' => $input['title'], 'slug' => $input['slug']]);
            }
        } else {
            if ($request->hasFile('image')) {
                $child = Category::create(['title' => $input['title'], 'slug' => $input['slug'], 'decription' => $input['description']]);
            } else {
                $child = Category::create(['title' => $input['title'], 'slug' => $input['slug']]);
            }

            $child->makeChildOf($input['parent_id']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Update $request
     * @param Category $category
     *
     * @return void
     */
    public function update(Update $request, Category $category)
    {
        $request['slug'] = Str::slug($request->input('title'));
        $slug = Category::where('title', $request['title'])->get();

        $input = $request->all();

        $count = count($slug);

        if ($count > 0) {
            $request['slug'] = $request['slug'] . '-' . $count;
        }

        $category->fill($input)->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     *
     * @return void
     * @throws Exception
     */
    public function destroy(Category $category)
    {

        $category->delete();
    }
}
