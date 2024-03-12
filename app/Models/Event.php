<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_eve';
    public $timestamps = false;

    protected $fillable = [
        'titlu',
        'data_inceput',
        'data_final',
        'descriere',
        'id_ogi',
        'id_lci',
    ];

    // Define relationships
    public function organizer()
    {
        return $this->belongsTo(Organizatori::class, 'id_ogi', 'id_ogi');
    }

    public function location()
    {
        return $this->belongsTo(Locatii::class, 'id_lci', 'id_lci');
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'contracte_speakeri', 'id_eve', 'id_spk')
            ->withPivot(['Data', 'ora_inceput', 'ora_sfarsit', 'tarif']);
    }

    public function partners()
    {
        return $this->belongsToMany(Partener::class, 'contracte_parteneri', 'id_eve', 'id_pti')
            ->withPivot(['valoare_sponsorizata']);
    }
}
