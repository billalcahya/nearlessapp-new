<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'suitability',
        'intensity',
        'sanitazion',
        'base_price',
        'image',
        'images',
        'estimated_duration',
        'whats_included',
        'is_active',
        'show_on_landing',
        'reviews',
        'created_by',
        'comparison_service_id',
        'comparison_service_two_id',
        'is_top_seller',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comparisonService()
    {
        return $this->belongsTo(Service::class, 'comparison_service_id');
    }

    public function comparisonServiceTwo()
    {
        return $this->belongsTo(Service::class, 'comparison_service_two_id');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
    
    protected $casts = [
        'images' => 'array',
        'whats_included' => 'array',
        'is_active' => 'boolean',
        'show_on_landing' => 'boolean',
        'reviews' => 'array',
        'is_top_seller' => 'boolean',
    ];
}
