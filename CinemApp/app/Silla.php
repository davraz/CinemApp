<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silla extends Model
{
    public function Sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
