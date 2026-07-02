<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    protected $fillable = [
        'service_id',
        'question',
        'answer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}