<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Promo extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'description',
        'type',
        'bonus_item_name',
        'min_transaction_items',
        'package_price',
        'image',
        'is_active',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Scope untuk mengambil promo yang sedang aktif (berdasarkan status dan tanggal)
     */
    public function scopeActive(Builder $query): void
    {
        $today = Carbon::today();

        $query->where('is_active', true)
            ->where(function ($q) use ($today) {
                $q->whereNull('start_date')
                    ->orWhere('start_date', '<=', $today);
            })
            ->where(function ($q) use ($today) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', $today);
            });
    }
}
