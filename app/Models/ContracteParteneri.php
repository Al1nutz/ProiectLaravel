<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContracteParteneri extends Model
{
    protected $table = 'contracte_parteneri';
    protected $primaryKey = 'id_cpi';
    public $timestamps = false;

    protected $fillable =[
        'valoare_sponsorizata',
        'id_eve',
        'id_pti'
    ];
}
