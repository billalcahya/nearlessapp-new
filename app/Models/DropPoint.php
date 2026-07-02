<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Tambahkan ini
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DropPoint extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'brand_partnership_id',
        'name',
        'address',
        'coordinates',
        'is_active',
        'image_path',
        'operational_hours',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'operational_hours' => 'array',
    ];

    public function brandPartnership(): BelongsTo
    {
        return $this->belongsTo(BrandPartnership::class, 'brand_partnership_id');
    }
}
