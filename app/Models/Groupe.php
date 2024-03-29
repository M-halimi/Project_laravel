<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    protected $fillable = ["groupe"];
    use HasFactory;
    public function stagier():HasMany
    {
        return $this->hasMany(Stagier::class);
    }
}
