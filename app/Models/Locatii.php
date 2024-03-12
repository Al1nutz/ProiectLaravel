<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locatii extends Model
{
    protected $table = 'locatii';
    protected $primaryKey = 'id_lci';
    public $timestamps = false;

    protected $fillable = [
      'strada',
      'numar',
      'oras',
      'judet',
      'capacitate_maxima',
      'denumire',
    ];
}
