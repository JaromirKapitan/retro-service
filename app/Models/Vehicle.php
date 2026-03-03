<?php

namespace App\Models;

use App\Enums\ContentStatusEnum;
use App\Enums\VehicleTypeEnum;
use App\Models\Traits\ContentAble;
use App\Models\Traits\LangMutation;
use App\Models\Traits\Seoble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string|null $type
 * @property string $brand
 * @property string $model
 * @property string $year_from
 * @property string|null $year_to
 * @property string|null $description
 * @property string|null $content
 * @property string|null $specs
 * @property string|null $modifications
 * @property string|null $links
 * @property string|null $lang
 * @property int|null $parent_id
 * @property ContentStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon|null $published_until
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vehicle> $childrens
 * @property-read int|null $childrens_count
 * @property-read mixed $content_html
 * @property-read mixed $is_published
 * @property-read mixed $links_html
 * @property-read mixed $modifications_html
 * @property-read mixed $mutations
 * @property-read mixed $specs_html
 * @property-read mixed $status_alt
 * @property-read mixed $sub_title
 * @property-read mixed $title
 * @property-read VehicleTypeEnum $type_enum
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\SeoData|null $seo
 * @property-read \App\Models\Task|null $task
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WebPage> $webPages
 * @property-read int|null $web_pages_count
 * @method static \Database\Factories\VehicleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle lang(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle ofType(\App\Enums\VehicleTypeEnum $type)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle published()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereModifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle wherePublishedUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereSpecs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereYearFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereYearTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle withoutTrashed()
 * @mixin \Eloquent
 */
class Vehicle extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, Seoble, InteractsWithMedia, LangMutation, ContentAble;

    protected $fillable = ['type', 'brand', 'model', 'year_from', 'year_to', 'description', 'content', 'status', 'lang', 'parent_id', 'specs', 'modifications', 'links', 'published_at', 'published_until'];

    protected $dates = ['published_at', 'published_until'];

    protected $attributes = [
        'status' => ContentStatusEnum::Draft->value
    ];

    protected static function booted()
    {
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('id', 'desc');
        });
    }

    public function webPages()
    {
        return $this->belongsToMany(WebPage::class);
    }

    public function getTitleAttribute()
    {
        return $this->brand . ' ' . $this->model;
    }

    public function getDefaultWebPage()
    {
        return $this->webPages()->second();
    }

    public function getSubTitleAttribute()
    {
        return $this->year_from . (!empty($this->year_to) ? ' - ' . $this->year_to : '');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->height(160);

        $this->addMediaConversion('small')
            ->height(360);
    }

    public function getContentHtmlAttribute()
    {
        return Str::of($this->content)->markdown()->value;
    }

    public function getSpecsHtmlAttribute()
    {
        return Str::of($this->specs)->markdown()->value;
    }

    public function getModificationsHtmlAttribute()
    {
        return Str::of($this->modifications)->markdown()->value;
    }

    public function getLinksHtmlAttribute()
    {
        return Str::of($this->links)->markdown()->value;
    }

    public function scopeOfType($query, VehicleTypeEnum $type)
    {
        return $query->where('type', $type->value);
    }

    public function getTypeEnumAttribute(): VehicleTypeEnum
    {
        return VehicleTypeEnum::from($this->type);
    }

    public function task(){
        return $this->hasOne(Task::class);
    }
}
