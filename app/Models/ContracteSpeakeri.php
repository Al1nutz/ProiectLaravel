<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContracteSpeakeri extends Model
{
    protected $table = 'contracte_speakeri';
    protected $primaryKey = 'id_csi';
    public $timestamps = false;

    protected $fillable = [
        'Data',
        'ora_inceput',
        'ora_sfarsit',
        'tarif',
        'id_spk',
        'id_eve'
    ];

    public function speaker()
    {
        return $this->belongsTo(Speaker::class, 'id_spk');
    }
}
