<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ville extends Model
{
    use HasFactory;


    /**
     * Get all of the TerrainGolfs for the Ville
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TerrainGolfs(): HasMany
    {
        return $this->hasMany(TerrainGolf::class);
    }
}
