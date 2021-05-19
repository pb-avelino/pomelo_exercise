<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /** @var array */
    protected $fillable = [
        'provider_id',
        'start_at',
        'end_at'
    ];

    /** @var array */
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /**
     * Retreive the provider for the current available slot
     *
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
