<?php

namespace App\Models;

use App\Models\Traits\LangMutation;
use App\Models\Traits\Seoble;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LogicException;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $lang
 * @property int|null $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Article> $articles
 * @property-read int|null $articles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, WebPage> $children
 * @property-read int|null $children_count
 * @property-read mixed $mutations
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read WebPage|null $parent
 * @property-read \App\Models\SeoData|null $seo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vehicle> $vehicles
 * @property-read int|null $vehicles_count
 * @method static \Database\Factories\WebPageFactory factory($count = null, $state = [])
 * @method static Builder<static>|WebPage lang(string $value)
 * @method static Builder<static>|WebPage newModelQuery()
 * @method static Builder<static>|WebPage newQuery()
 * @method static Builder<static>|WebPage parents()
 * @method static Builder<static>|WebPage query()
 * @method static Builder<static>|WebPage whereContent($value)
 * @method static Builder<static>|WebPage whereCreatedAt($value)
 * @method static Builder<static>|WebPage whereDescription($value)
 * @method static Builder<static>|WebPage whereId($value)
 * @method static Builder<static>|WebPage whereLang($value)
 * @method static Builder<static>|WebPage whereParentId($value)
 * @method static Builder<static>|WebPage whereTitle($value)
 * @method static Builder<static>|WebPage whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, WebPage> $childrens
 * @property-read int|null $childrens_count
 * @mixin \Eloquent
 */
class WebPage extends Model implements HasMedia
{
    use HasFactory, Seoble, InteractsWithMedia, LangMutation;

    protected $fillable = ['title', 'description', 'content', 'lang', 'parent_id'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function scopeParents(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function delete(): bool|null
    {
        throw new LogicException('WebPage records cannot be deleted.');
    }
}
