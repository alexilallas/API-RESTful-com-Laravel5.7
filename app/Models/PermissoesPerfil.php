<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissoesPerfil extends BaseModel
{
    protected $table = 'perfil_permissao';

    protected $fillable = [
        'permissao_id','perfil_id'
    ];
}
