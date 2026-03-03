<?php

namespace App\Models;

use App\Enums\ContentStatusEnum;
use App\Models\Traits\ContentAble;
use App\Models\Traits\LangMutation;
use App\Models\Traits\Seoble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $content
 * @property ContentStatusEnum|null $status
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon|null $published_until
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $lang
 * @property int|null $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Article> $childrens
 * @property-read int|null $childrens_count
 * @property-read mixed $content_html
 * @property-read mixed $is_published
 * @property-read mixed $mutations
 * @property-read mixed $status_alt
 * @property-read mixed $sub_title
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\SeoData|null $seo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WebPage> $webPages
 * @property-read int|null $web_pages_count
 * @method static \Database\Factories\ArticleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article lang(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article published()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article wherePublishedUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article withoutTrashed()
 * @mixin \Eloquent
 */
class Article extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, Seoble, InteractsWithMedia, LangMutation, ContentAble;

    protected $fillable = ['title', 'description', 'content', 'status', 'lang', 'parent_id'];

    protected $attributes = [
        'status' => ContentStatusEnum::Draft->value
    ];

    public function webPages()
    {
        return $this->belongsToMany(WebPage::class);
    }
}
