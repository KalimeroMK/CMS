<?php


namespace App\Http\Helpers;


use App\Models\Post;
use App\Models\Source;
use App\Traits\ImageUpload;
use App\Traits\Tags;
use Exception;
use Illuminate\Support\Str;
use Sabre\Xml\LibXMLException;
use Session;


class Refresh
{
    use Tags;
    use ImageUpload;

    public function UpdateFeed($id = null)
    {

        $source = Source::findOrFail($id);

        try {
            $request = 'https://ogledalo.mk/full-text-rss/makefulltextfeed.php?format=json&url=' . $source->url . '&max=30';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $request);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($result);
            $item = $json->rss->channel->item;
            foreach ($item as $items) {
                $post = Post::updateOrCreate(['slug' => Str::slug($items->title)],
                    [
                        'title' => $items->title,
                        'link' => $items->link,
                        'author_id' => $source->user_id,
                        'slug' => Str::slug($items->title),
                        'description' => $items->description,
                        'category_id' => $source->category_id,
                        'featured_image' => $this->imageDownload($items->description),
                        'show_post_source' => $source->show_post_source,
                        'source_id' => $source->id
                    ]);
                try {
                    if (isset($items->category)) {
                        $this->createTags($items->category, $post->id);
                    }
                } catch (Exception $ex) {

                }
            }

        } catch (LibXMLException $e) {
            Session::flash('error_msg', trans('messages.invalid_source_url_only_rss_or_atom_allowed'));
            return redirect()->back();
        }

    }
}