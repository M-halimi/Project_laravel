<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modele extends Model
{
    protected $fillable =["libelle","mh"];
    use HasFactory;
    public function note():HasMany
    {
        return $this->hasMany(Note::class);
    }
}
