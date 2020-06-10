<?php


namespace App\Services;


use App\Http\Requests\Gallery\Store;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\User;
use App\Traits\ImageUpload;
use Exception;
use File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryService
{
    use ImageUpload;

    /**
     * @param Post $post
     * @return array
     */
    public function index(Post $post)
    {
        $users = User::all();
        $sliders = Gallery::where('product_id', '=', $post->id)->get();
        return compact('users', 'sliders', 'post');
    }

    /**
     * @param Store $request
     */
    public function store(Store $request)
    {

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $images) {
                $ext = $images->getClientOriginalExtension();

                $paths = $this->makePaths();
                File::makeDirectory($paths->original, $mode = 0755, true, true);
                File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
                File::makeDirectory($paths->medium, $mode = 0755, true, true);

                $imageName = rand(1003332, 1003332443434) . '.' . strtolower($ext);

                $images->move($paths->original, $imageName);

                $findimage = $paths->original . $imageName;
                $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imagethumb->save($paths->thumbnail . $imageName);
                $imagemedium->save($paths->medium . $imageName);

                $images = $request->image = $imageName;
                $input['image'] = $images;


                Gallery::create($input);

            }
        }
    }

    /**
     * @return object
     */
    public function makePaths()
    {

        $original = public_path() . '/admin/img/gallery/';
        $thumbnail = public_path() . '/admin/img/gallery/thumbnails/';
        $medium = public_path() . '/admin/img/gallery/medium/';
        return (object)compact('original', 'thumbnail', 'medium');
    }

    /**
     * @param Request $request
     * @throws Exception
     */
    public function destroy(Request $request)
    {
        $slider = Gallery::FindOrFail($request['id']);

        $paths = $this->makePaths();
        $image = $paths->original . $slider->image;
        $imagemedium = $paths->medium . $slider->image;
        $imagethumb = $paths->thumbnail . $slider->image;

        if (file_exists($image)) {
            unlink($image);
        }
        if (file_exists($imagemedium)) {
            unlink($imagemedium);
        }
        if (file_exists($imagethumb)) {
            unlink($imagethumb);
        }

        $slider->delete();

    }
}
