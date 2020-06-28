<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Kalnoy\Nestedset\Collection;
use Kalnoy\Nestedset\NodeTrait;
use Kalnoy\Nestedset\QueryBuilder;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $publish
 * @property int|null $parent_id
 * @property int|null $_lft
 * @property int|null $_rgt
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Post[] $post
 * @property-read int|null $post_count
 * @method static Collection|static[] all($columns = ['*'])
 * @method static Builder|Category d()
 * @method static Collection|static[] get($columns = ['*'])
 * @method static QueryBuilder|Category newModelQuery()
 * @method static QueryBuilder|Category newQuery()
 * @method static QueryBuilder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereLft($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category wherePublish($value)
 * @method static Builder|Category whereRgt($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Category[] $childrenCategories
 * @property-read int|null $children_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 */
class Category extends Model
{
    use ClearsResponseCache;
    use NodeTrait;

    protected $table = 'categories';
    protected $fillable = ['title', 'slug', 'parent_id'];

    /**
     * @return string
     */
    public static function getTree()
    {
        $categories = self::get()->toTree();
        $traverse = function ($categories, $prefix = '') use (&$traverse, &$allCats) {
            foreach ($categories as $category) {
                $allCats[] = ["title" => $prefix . ' ' . $category->title, "id" => $category->id];
                $traverse($category->children, $prefix . '-');
            }
            return $allCats;
        };
        return $traverse($categories);
    }

    /**
     * @return string
     */
    public static function getList()
    {
        $categories = self::get()->toTree();
        $lists = '<li class="list-unstyled">';
        foreach ($categories as $category) {
            $lists .= self::renderNodeHP($category);
        }
        $lists .= "</li>";
        return $lists;
    }

    /**
     * @param $node
     * @return string
     */
    public static function renderNodeHP($node)
    {
        $list = '<li class="dropdown-item"><a class="nav-link" href="/categories/' . $node->slug . '">' . $node->title . '</a>';
        if ($node->children()->count() > 0) {
            $list .= '<ul class="dropdown-menu">';
            foreach ($node->children as $child) {
                $list .= self::renderNodeHP($child);
            }
            $list .= "</ul>";
        }
        $list .= "</li>";
        return $list;
    }


    /**
     * @return HasMany
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    /**
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
