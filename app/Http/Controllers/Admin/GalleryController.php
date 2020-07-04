<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\Store;
use App\Models\Gallery;
use App\Models\Post;
use Exception;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id)
    {
        $post = Post::findOrFail($id);
        $gallery = Gallery::wherePostId($id)->get();
        return view('admin.gallery.addGallery', compact('gallery', 'post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $gallery = new Gallery();
        return view('admin.gallery.create', $gallery);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store $request)
    {
        $post_id = $request['post_id'];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $image) {
                $name = Str::random(15) . '.' . $image->getClientOriginalExtension();
                $paths = $this->makePaths();
                File::makeDirectory($paths->original, $mode = 0755, true, true);
                $image->move($paths->original, $name);
                $gallery = new Gallery();
                $gallery->image = $name;
                $gallery->post_id = $post_id;
                $gallery->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gallery $gallery
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Gallery $gallery)
    {
//         Delete images
        $image = public_path() . '/uploads/images/gallery/' . $gallery->image;
        unlink($image);
        $gallery->delete();
        return redirect()->back();
    }

    /**
     * Make paths for storing images.
     *
     * @return object
     */
    public function makePaths()
    {
        $original = public_path() . '/uploads/images/gallery/';
        return (object)compact('original');
    }
}
