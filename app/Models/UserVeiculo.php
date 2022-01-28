<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVeiculo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_veiculos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'marca_id',
        'modelo_id',
        'cor_id',
        'veiculo_tipo',
        'placa',
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
    protected $with = ['cor','marca','modelo','veiculo_tipo', 'usuario'];

     public function usuario()
    {
        return $this->belongsTo(User::class);
    }

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

}
