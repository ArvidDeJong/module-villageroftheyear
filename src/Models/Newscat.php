<?php

namespace Darvis\ModuleNews\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Darvis\Manta\Traits\HasUploadsTrait;

class Newscat extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUploadsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'created_by',
        'updated_by',
        'deleted_by',
        'company_id',
        'host',
        'pid',
        'locale',
        'newscat_id',
        'title',
        'title_2',
        'slug',
        'seo_title',
        'seo_description',
        'summary',
        'tags',
        'excerpt',
        'content',
        'data',        // Nieuwe kolom
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * @param mixed $value 
     * @return mixed 
     */
    public function getDataAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    public function news(): HasOne
    {
        return $this->hasOne(Newscatjoin::class)
            ->join('news', 'news.id', '=', 'newscatjoins.news_id');
    }

    public function newss(): HasMany
    {
        return $this->hasMany(Newscatjoin::class)
            ->join('news', 'news.id', '=', 'newscatjoins.news_id');
    }
}
