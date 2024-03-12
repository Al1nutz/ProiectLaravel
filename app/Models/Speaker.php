<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $table = 'speakeri';
    protected $primaryKey = 'id_spk';
    public $timestamps = false;

    protected $fillable = [
        'Nume_speaker',
        'Prenume_speaker',
        'Telefon_speaker',
        'Email_speaker',
    ];

    public function contracteSpeakeri()
    {
        return $this->hasMany(ContracteSpeakeri::class, 'id_spk');
    }
}
