<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\Request;
use App\Libraries\Utils;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\PostRating;
use App\Models\Source;
use App\Models\Tag;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Input;
use Session;
use URL;

class HomeController extends Controller
{
    /**
     * @return Factory|View
     * @throws Exception
     */
    public function index()
    {
        $post = Post::with('tags', 'category', 'source')
            ->orderBy('id', 'desc')
            ->where('status', config('constants.STATUS_PUBLISHED'))
            ->paginate(15);
        return view('index', compact('post'));
    }

    /**
     * @param $slug
     * @return Factory|View
     */
    public function category($slug)
    {
        if ($slug == "all") {
            $post = Post::all();
            return view('category', compact('post'));
        } else {
            $category = Category::whereSlug($slug)->firstOrFail();
            $post = Post::where('category_id', '=', $category->id)->get();
        }
        return view('category', compact('post', 'category'));
    }

    /**
     * @param $slug
     * @return Factory|View
     */
    public function article($slug)
    {
        $post = Post::whereSlug($slug)->first();
        Post::where('slug', $slug)->update(['views' => $post->views + 1]);

        if ($post->render_type == config('constants.RENDER_TYPE_GALLERY')) {
            $post->gallery = Gallery::where('post_id', $post->id)->get();
        }

        $post->next = Post::where("id", ">", $post->id)->first();
        $post->prev = Post::where("id", "<", $post->id)->orderBy('created_at', 'desc')->first();

        $related_posts = Post::where('id', '!=', $post->id)->orderBy('created_at', 'desc')
            ->where('status', config('constants.STATUS_PUBLISHED'))
            ->where('category_id', $post->category_id)
            ->limit(3)->get();

        foreach ($related_posts as $p) {
            $p->author = User::where('id', $p->author_id)->first();
            $p->ategory = Category::where('id', $p->category_id)->first();
        }

        $source = Source::where('id', $post->source_id)->first();


        return view('article', compact('post', 'source', 'related_posts'));
    }

    /**
     * @param $slug
     * @return Factory|RedirectResponse|View
     */
    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first();

        $page->next = Page::where("id", ">", $page->id)->first();
        $page->prev = Page::where("id", "<", $page->id)->orderBy('created_at', 'desc')->first();
        $page->author = User::where('id', $page->author_id)->first();

        $related_pages = Page::where('id', '!=', $page->id)->orderBy('created_at', 'desc')->where('status', '1')->where('description', 'LIKE', '%' . $page->description . '%')->limit(10)->get();

        foreach ($related_pages as $p) {
            $p->author = User::where('id', $p->author_id)->first();
        }

        return view('page', compact('page'));
    }

    /**
     * @param $slug
     * @return Factory|RedirectResponse|View
     */
    public function byAuthor($slug)
    {
        $author = User::whereSlug($slug)->first();

        $posts = Post::where('author_id', $author->id)
            ->orderBy('posts.created_at', 'desc')
            ->where('posts.status', '1')
            ->select('posts.*')
            ->paginate(8);

        foreach ($posts as $post) {
            $post->category = Category::where('id', $post->category_id)->first();
        }

        return view('author', compact('author', 'group_id', 'posts'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function bySearch(Request $request)
    {
        $search_term = $request->input('search');

        $posts = Post::where('title', 'LIKE', '%' . $search_term . '%')->where('description', 'LIKE', '%' . $search_term . '%')->orderBy('created_at', 'desc')->where('status', config('constants.STATUS_PUBLISHED'))->paginate(10);

        return view('search', compact('posts'));
    }

    /**
     * @param $slug
     * @return Factory|RedirectResponse|View
     */
    public function tag($slug)
    {
        $tag = Tag::whereSlug($slug)->first();
        $posts = Post::whereHas('tags', function ($q) use ($tag) {
            $q->where('title', '=', $tag->title);
        })
            ->paginate(10);
        return view('tag', compact('posts', 'tag'));
    }

    /**
     * @return RedirectResponse
     */
    public function submitLike()
    {
        $post_id = Input::get('id');
        $type = Input::get('type');

        if ($post_id < 0) {
            Session::flash('error_msg', trans('messages.internal_server_error'));
            return redirect()->back();
        } else {
            $post_rating = PostLike::where('email', Input::get('email'))->where('post_id', $post_id)->first();

            if ($type == 1 || $type == 0) {
                if (!empty($post_rating)) {
                    $post_rating->rating = $type;
                    $post_rating->approved = 1;
                    $post_rating->save();
                } else {
                    $post_rating = new PostLike();
                    $post_rating->post_id = $post_id;
                    $post_rating->name = Input::get('name');
                    $post_rating->email = Input::get('email');
                    $post_rating->rating = $type;
                    $post_rating->approved = 1;
                    $post_rating->save();
                }

                Session::flash('success_msg', trans('messages.thanks_for_rating'));
                return redirect()->back();
            }
        }
    }

    /**
     * @return RedirectResponse
     */
    public function submitRating()
    {
        $post_id = Input::get('id');

        if (!Input::has('star') || !Input::has('name') || !Input::has('email') || !Input::has('id')) {
            Session::flash('error_msg', trans('messages.all_field_required_to_submit_rating'));
            return redirect()->back();
        } else {
            $post_rating = PostRating::where('email', Input::get('email'))->where('post_id', $post_id)->first();

            if (!empty($post_rating)) {
                $post_rating->rating = Input::get('star');
                $post_rating->approved = 1;
                $post_rating->save();
            } else {
                $post_rating = new PostRating();
                $post_rating->post_id = $post_id;
                $post_rating->name = Input::get('name');
                $post_rating->email = Input::get('email');
                $post_rating->rating = Input::get('star');
                $post_rating->approved = 1;
                $post_rating->save();
            }

            Session::flash('success_msg', trans('messages.thanks_for_rating'));
            return redirect()->back();
        }
    }

    /**
     * @return ResponseFactory|Response
     * @throws Exception
     */
    public function rss()
    {
        $settings_general = Utils::getSettings("general");
        $settings_seo = Utils::getSettings("seo");

        if ($settings_general->generate_rss_feeds != 1) {
            return $this->throw404();
        }

        $feed = Feed::feed('2.0', 'UTF-8');

        $feed->channel(array('title' => $settings_general->site_title, 'description' => $settings_seo->seo_description, 'link' => $settings_general->site_url));

        $posts = Post::join('sources', 'posts.source_id', '=', 'sources.id')
            ->orderBy('sources.priority', 'asc')
            ->orderBy('posts.created_at', 'desc')
            ->where('posts.status', config('constants.STATUS_PUBLISHED'))
            ->select('posts.*')->limit(50)->get();

        foreach ($posts as $post) {
            $author = User::where('id', $post->author_id)->first();

            if ($post->type == Post::TYPE_SOURCE) {
                if ($settings_general->include_sources == 1) {
                    $feed->item(
                        ['title' => $post->title,
                            'description|cdata' => $post->description,
                            'link' => URL::to($post->slug),
                            'guid' => URL::to($post->slug),
                            'author' => $author->email . "($author->name)"
                        ]
                    );
                }
            } else {
                $feed->item(
                    ['title' => $post->title,
                        'description|cdata' => $post->description,
                        'link' => URL::to($post->slug),
                        'guid' => URL::to($post->slug),
                        'author' => $author->email . "($author->name)"
                    ]
                );
            }
        }

        return response($feed, 200, array('Content-Type' => 'text/xml'));
    }

    /**
     * @return mixed
     */
    public function sitemap()
    {
        $settings_general = Utils::getSettings("general");

        if ($settings_general->generate_sitemap == 1) {

            // create new sitemap object
            $sitemap = App::make("sitemap");

            // get all posts from db
            $posts = DB::table('posts')->orderBy('created_at', 'desc')->limit(100)->get();

            // add every post to the sitemap
            foreach ($posts as $post) {
                $sitemap->add(URL::to('/') . "/" . $post->slug, $post->updated_at, '1', 'weekly', null, $post->title);
            }

            $pages = DB::table('pages')->orderBy('created_at', 'desc')->get();

            // add every page to the sitemap
            foreach ($pages as $page) {
                $sitemap->add(URL::to('/') . "/" . $page->slug, $page->updated_at, '1', 'weekly', null, $page->title);
            }

            $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();

            // add every category to the sitemap
            foreach ($categories as $category) {
                $sub_categories = Category::where('parent_id', $category->id)->get();

                $sitemap->add(URL::to('/') . "/category/" . $category->slug, $category->updated_at, '1', 'weekly', null, $category->title);

                foreach ($sub_categories as $sub_category) {
                    $sitemap->add(URL::to('/') . "/category/" . $category->slug . "/" . $sub_category->slug, $category->updated_at, '1', 'weekly', null, $category->title);
                }
            }

            return $sitemap->render('xml');
        }
    }
}
