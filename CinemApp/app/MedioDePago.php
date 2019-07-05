<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioDePago extends Model
{
    protected $table = 'mediosdepago';

    public function usuario()
    {
        $this->belongsTo(Usuario::class);
    }
}
