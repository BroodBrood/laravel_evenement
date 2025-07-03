<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evenement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'naam',
        'beschrijving',
        'datum',
        'tijd',
        'locatie',
        'prijs',
        'maximum_deelnemers',
        'evenement_type_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'datum' => 'date',
        'tijd' => 'datetime:H:i',
        'prijs' => 'decimal:2',
    ];

    /**
     * Get the evenement type that owns the evenement.
     */
    public function evenementType(): BelongsTo
    {
        return $this->belongsTo(EvenementType::class);
    }
}
