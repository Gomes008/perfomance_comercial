<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultor extends Model
{
    use HasFactory;

    protected $table = 'cao_usuario';
    

    function o_servico(){
        return $this->hasMany(Os::class, 'co_usuario', 'co_usuario');
    }

    

}
