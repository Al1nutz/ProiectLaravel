<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partener extends Model
{
    protected $table = 'parteneri';
    protected $primaryKey = 'id_pti';
    public $timestamps = false;

    protected $fillable = [
        'Denumire',
        'Telefon_partener',
        'Email_partener',
    ];
}
