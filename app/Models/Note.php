<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// class Note extends Model
// {
//     protected $fillable = ["stagiers_id","modeles_id","note"];
//     use HasFactory;
//     public function modele():BelongsTo
//     {
//         return $this->belongsTo(Modele::class);
//     }
//     public function stagier():BelongsTo
//     {
//         return $this->belongsTo(Stagier::class);
//     }
// }
class Note extends Model
{
    protected $fillable = ["stagiers_id","modeles_id","note"];
    public function stagier()
    {
        return $this->belongsTo(Stagier::class, 'stagiers_id');
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class, 'modeles_id');
    }
}
