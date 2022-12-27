<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TerrainGolf extends Model
{
    use HasFactory;

    /**
     * Get all of the Image for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Get the Video associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Video(): HasOne
    {
        return $this->hasOne(Video::class);
    }
    /**
     * Get the Ville that owns the TerrainGolf
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Ville(): BelongsTo
    {
        return $this->belongsTo(Ville::class);
    }
}
