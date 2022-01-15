<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    public $table = "mensagens";
    
    protected $fillable = [
        'mensagem',
        'remetente_id',
        'destinatario_id',
        'lido'
    ];

    public function destinatario()
    {
        return $this->hasOne(User::class);
    }

    public function remetente()
    {
        return $this->hasOne(User::class);
    }

}
