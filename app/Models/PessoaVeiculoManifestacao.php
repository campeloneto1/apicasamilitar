<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaVeiculoManifestacao extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pessoas_veiculos_manifestacoes';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'pessoa_id',
        'veiculo_id',
        'manifestacao_id',
        'sindicato_id',

        'data',
        'hora',

        'lider',
        
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
    protected $with = ['pessoa', 'veiculo', 'manifestacao', 'sindicato'];


    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function manifestacao()
    {
        return $this->belongsTo(Manifestacao::class);
    }

    public function sindicato()
    {
        return $this->belongsTo(Sindicato::class);
    }

}
