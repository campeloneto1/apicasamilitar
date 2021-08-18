<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'viaturas';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo',
        'orgao_id',
        'setor_id',
        'marca_id',
        'modelo_id',
        'veiculo_tipo_id',
        'cor_id',
        'placa',
        'chassi',
        'renavam',
        'km_inicial',
        'km_atual',
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
    protected $with = ['orgao','setor','marca','modelo','veiculo_tipo','cor'];


    public function orgao()
    {
        return $this->belongsTo(Orgao::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
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

    public function cor()
    {
        return $this->belongsTo(Cor::class);
    }

    public function eventos()
    {     
       return $this->belongsToMany(Evento::class, 'eventos_viaturas', 'viatura_id', 'evento_id')->withPivot('id', 'km_inicial', 'km_final', 'created_by');
    }
}
