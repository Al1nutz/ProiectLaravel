<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilet extends Model
{
    protected $table = 'bilete';
    protected $fillable = [
        'id_eve',
        'tip_bilete',
        'id_user',
        'pret',
    ];
    protected $primaryKey = 'id_blt';
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_blt');
    }
    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Event::class, 'id_eve', 'id_eve');
    }
}

