<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perfis';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',

        'administrador',
        'gestor',

        'acesso',
        'c1',
        'relatorios',
        'estrategico',

        'users',
        'users_cad',
        'users_edit',
        'users_del',
        'users_dig',
        'users_ace',
        'users_foto',

        'eventos',
        'eventos_cad',
        'eventos_edit',
        'eventos_del',
        'eventos_usu',
        'eventos_vei',

        'viaturas',
        'viaturas_cad',
        'viaturas_edit',
        'viaturas_del',
        
        'created_by',
        'updated_by'
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';


}