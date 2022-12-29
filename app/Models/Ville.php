<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ville extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Terrains(): HasMany
    {
        return $this->hasMany(Terrain::class);
    }
}
