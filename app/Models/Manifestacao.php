<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifestacao extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'manifestacoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'data',
        'hora',
        'manifestacao_tipo_id',
        'tipo_id',
       
        'rua',
        'numero',
        'complemento',
        'estado_id',
        'cidade_id',
        'cep',
        'observacao',
        'previa',
        'sintese',
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
    protected $with = [ 'manifestacao_tipo', 'estado', 'cidade'];

  

    public function manifestacao_tipo()
    {
        return $this->belongsTo(ManifestacaoTipo::class);
    }

    /*
     public function veiculos()
    {     
       return $this->belongsToMany(Veiculo::class, 'pessoas_veiculos_manifestacoes', 'manifestacao_id', 'veiculo_id')->withPivot('id', 'data', 'hora', 'veiculo_id', 'pessoa_id', 'manifestacao_id', 'created_by');
    }

    public function pessoas()
    {     
       return $this->belongsToMany(Pessoa::class, 'pessoas_veiculos_manifestacoes', 'manifestacao_id', 'pessoa_id')->withPivot('id', 'data', 'hora', 'lider', 'veiculo_id', 'pessoa_id', 'manifestacao_id', 'created_by');
    }*/

    public function pessoas()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'manifestacao_id')->whereNotNull('pessoa_id');
    }

    public function veiculos()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'manifestacao_id')->whereNotNull('veiculo_id');
    }

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'manifestacao_id');
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
