<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BrandPartnership extends Model
{
    use SoftDeletes;

    protected $table = 'brand_partnerships';

    protected $fillable = [
        'brand_name',
        'logo_path',
        'website_url',
        'partnership_period',
        'collaboration_type',
        'reason_for_partnership',
        'project_outcome',
        'is_active', 
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function dropPoints(): HasMany
    {
        return $this->hasMany(DropPoint::class, 'brand_partnership_id');
    }

    public function getDropPointNameAttribute(): ?string
    {
        return $this->dropPoints->first()?->name;
    }
}