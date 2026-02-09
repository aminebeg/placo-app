<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_en', 'name_fr', 'name_ar',
        'description_en', 'description_fr', 'description_ar',
        'category_id', 'price', 'currency', 'status',
        'image_url', 'images', 'specs',
        'weight_kg', 'pieces_per_bundle', 'technical_sheet_url', 'how_to_use_video_url'
    ];

    protected $casts = [
        'specs' => 'array',
        'images' => 'array',
        'price' => 'decimal:2'
    ];

    protected $appends = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->attributes["name_{$locale}"] ?? $this->attributes['name_en'];
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->attributes["description_{$locale}"] ?? $this->attributes['description_en'] ?? '';
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
