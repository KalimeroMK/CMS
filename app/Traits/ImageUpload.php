<?php

namespace App\Traits;

use Exception;
use File;
use Htmldom;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageUpload
{
    /**
     * @param $html
     * @param int $index
     * @return string
     */
    static function getImageFromString($html, $index = 0)
    {
        $html_parser = new Htmldom();
        $html_parser->str_get_html($html);
        return isset($html_parser->find('img')[$index]) ? $html_parser->find('img')[$index]->src : '';
    }

    /**
     * @param Request $request
     * @return string
     */
    public function verifyAndStoreImage(Request $request)
    {

        if ($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');
            $imageName = str_random(15) . '.' . $image->getClientOriginalExtension();
            $paths = $this->makePaths();
            File::makeDirectory($paths->original, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);
            $image->move($paths->original, $imageName);
            $find_image = $paths->original . $imageName;
            $image_thumb = Image::make($find_image)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_medium = Image::make($find_image)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_thumb->save($paths->thumbnail . $imageName);
            $image_medium->save($paths->medium . $imageName);

            return $imageName;
        }
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

    /**
     * @param Request $request
     * @return string
     */
    public function verifyAndStoreGallery(Request $request)
    {

        if ($request->hasFile('image_gallery')) {

            $image = $request->file('image_gallery');
            $imageName = str_random(15) . '.' . $image->getClientOriginalExtension();
            $paths = $this->makePaths();
            File::makeDirectory($paths->original, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);
            $image->move($paths->original, $imageName);
            $find_image = $paths->original . $imageName;
            $image_thumb = Image::make($find_image)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_medium = Image::make($find_image)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_thumb->save($paths->thumbnail . $imageName);
            $image_medium->save($paths->medium . $imageName);

            return $imageName;
        }
    }

    public function imageDownload($items)
    {
        $find_img = ImageUpload::getImageWithSizeGreaterThan($items);
        $path = ($find_img);
        $filename = basename($path);
        if (strpos($filename, '?') !== false) {
            $imageName = substr($filename, 0, strrpos($filename, "?"));
        } else {
            $imageName = $filename;
        }
        $paths = $this->makePaths();
        File::makeDirectory($paths->original, $mode = 0755, true, true);
        File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
        File::makeDirectory($paths->medium, $mode = 0755, true, true);
        try {
            $image_thumb = Image::make(file_get_contents($path));
            $image_medium = Image::make(file_get_contents($path));
            $image_original = Image::make(file_get_contents($path));
            $image_thumb->save($paths->thumbnail . $imageName);
            $image_medium->save($paths->medium . $imageName);
            $image_original->save($paths->original . $imageName);
        } catch (Exception $ex) {

        }

        return $imageName;
    }

    static function getImageWithSizeGreaterThan($html, $size = 200)
    {
        ini_set('allow_url_fopen', 1);
        $html_parser = new Htmldom();
        $html_parser->str_get_html($html);

        $featured_img = "";

        $imgs = $html_parser->find('img');

        foreach ($imgs as $img) {

            try {
                list($width, $height) = getimagesize($img->src);

                if ($width >= $size) {
                    $featured_img = $img->src;
                    break;
                }
            } catch (Exception $e) {
                continue;
            }

        }

        return $featured_img;
    }

}
