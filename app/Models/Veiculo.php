<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'veiculos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo',
        
        'marca_id',
        'modelo_id',
        'pessoa_id',
        'veiculo_tipo_id',
        'placa',
        'chassi',
        'renavam',
        
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
    protected $with = ['cor','marca','modelo','veiculo_tipo', 'proprietario'];


   

     public function cor()
    {
        return $this->belongsTo(Cor::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function veiculo_tipo()
    {
        return $this->belongsTo(VeiculoTipo::class);
    }

    public function proprietario()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

     public function pessoas()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'veiculo_id')->whereNotNull('pessoa_id');
    }

    public function manifestacoes()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'veiculo_id')->whereNotNull('manifestacao_id');
    }

     public function sindicatos()
    {
        return $this->hasMany(PessoaVeiculoManifestacao::class, 'veiculo_id')->whereNotNull('sindicato_id');
    }

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'veiculo_id');
    }

    /*
     public function pessoas()
    {     
       return $this->belongsToMany(Pessoa::class, 'pessoas_veiculos_manifestacoes', 'veiculo_id', 'pessoa_id')->withPivot('id', 'data', 'hora', 'veiculo_id', 'pessoa_id', 'manifestacao_id', 'created_by');
    }

     public function manifestacoes()
    {     
       return $this->belongsToMany(Manifestacao::class, 'pessoas_veiculos_manifestacoes', 'veiculo_id', 'manifestacao_id')->withPivot('id', 'data', 'hora', 'veiculo_id', 'pessoa_id', 'manifestacao_id', 'created_by');
    }*/
   
}
