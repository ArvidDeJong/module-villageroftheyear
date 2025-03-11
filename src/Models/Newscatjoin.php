<?php

namespace Darvis\ModuleNews\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;

class Newscatjoin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'created_by',
        'updated_by',
        'deleted_by',
        'news_id',
        'newscat_id',
        'data',        // Nieuwe kolom
    ];

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


    public function category(): HasOne
    {
        return $this->hasOne(Newscatjoin::class, 'newscat_id')
            ->join('newscats', 'newscats.id', '=', 'newscatjoins.newscat_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Newscatjoin::class)
            ->join('newscats', 'newscats.id', '=', 'newscatjoins.newscat_id');
    }

    public function news(): HasOne
    {
        return $this->hasOne(Newscatjoin::class, 'id', 'news_id')
            ->join('news', 'news.id', '=', 'newscatjoins.news_id');
    }

    public function newss(): HasMany
    {
        return $this->hasMany(Newscatjoin::class)
            ->join('news', 'news.id', '=', 'newscatjoins.news_id');
    }
}
