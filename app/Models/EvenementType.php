<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EvenementType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'naam',
        'beschrijving',
    ];

    /**
     * Get the evenementen for the evenement type.
     */
    public function evenementen(): HasMany
    {
        return $this->hasMany(Evenement::class);
    }
}
