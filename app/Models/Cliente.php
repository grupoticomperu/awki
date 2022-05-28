<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created-at', 'updated_at'];

    const FACTURA = 1;
    const BOLETA = 2;

    const SOLTERO = 1;
    const CASADO = 2;
    const VIUDO = 3;
    const DIVORCIADO = 4;

    const CONFORME = 1;
    const NOFIGURAPAGOADMIN = 2;


    //relacion de uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    




    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
