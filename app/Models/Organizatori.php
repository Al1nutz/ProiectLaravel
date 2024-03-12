<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizatori extends Model
{
    protected $table = 'organizatori';
    protected $primaryKey = 'id_ogi';
    public $timestamps = false;

    protected $fillable = [
        'denumire',
        'telefon',
        'email',
    ];
}
