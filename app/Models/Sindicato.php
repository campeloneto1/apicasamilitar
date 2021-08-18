<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sindicato extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sindicatos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        
        'email',
        'telefone1',
        'telefone2',
        'rua',
        'numero',
        'complemento',
        'estado_id',
        'cidade_id',
        'cep',
        
        'observacao',

        'key',
        'created_by',
        'updated_by'
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

     /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['estado', 'cidade'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

     public function pessoas()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'sindicato_id')->whereNotNull('pessoa_id');
    }

    public function veiculos()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'sindicato_id')->whereNotNull('veiculo_id');
    }

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'sindicato_id');
    }
}
