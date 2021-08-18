<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pessoas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'alcunha',
        'cpf',
        'data_nascimento',
        'mae',
        'pai',
        'influencia_id',
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
        
        'digital',
        'key',
        'foto',
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
    protected $with = ['redes_sociais', 'estado', 'cidade', 'influencia', 'arquivos'];
/*
    public function veiculos()
    {     
       return $this->belongsToMany(Veiculo::class, 'pessoas_veiculos_manifestacoes', 'pessoa_id', 'veiculo_id')->withPivot('id', 'data', 'hora', 'veiculo_id', 'pessoa_id', 'manifestacao_id', 'created_by');
    }

    public function manifestacoes()
    {     
       return $this->belongsToMany(Manifestacao::class, 'pessoas_veiculos_manifestacoes', 'pessoa_id', 'manifestacao_id')->withPivot('id', 'data', 'hora', 'lider', 'veiculo_id', 'pessoa_id', 'manifestacao_id', 'created_by');
    }*/

    public function redes_sociais()
    {     
       return $this->belongsToMany(RedeSocial::class, 'pessoas_redes_sociais', 'pessoa_id', 'rede_social_id')->withPivot('id', 'nome', 'created_by');
    }

    public function veiculos()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'pessoa_id')->whereNotNull('veiculo_id');
    }

    public function manifestacoes()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'pessoa_id')->whereNotNull('manifestacao_id');
    }

     public function sindicatos()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'pessoa_id')->whereNotNull('sindicato_id');
    }

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'pessoa_id');
    }

    public function influencia()
    {
        return $this->belongsTo(Influencia::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

}
