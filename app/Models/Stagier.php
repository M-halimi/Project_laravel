<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stagier extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prenom","ville","adresse","email","photo","groupe_id"];
    public function groupe():BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }
    public function note():HasMany
    {
        return $this->hasMany(Note::class);
    }
}
