<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eventos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'orgao_id',
        'setor_id',
        'evento_tipo_id',
        'cidade_id',
        'estado_id',
        'data',
        'hora',
        'observacao',
        
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
    protected $with = ['eventotipo','setor', 'orgao', 'usuarios', 'cidade', 'estado', 'viaturas'];


     public function eventotipo()
    {
        return $this->belongsTo(EventoTipo::class, 'evento_tipo_id');
    }

    public function orgao()
    {
        return $this->belongsTo(Orgao::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function usuarios()
    {     
       return $this->belongsToMany(User::class, 'eventos_users', 'evento_id', 'user_id')->withPivot('id', 'presente', 'data', 'hora', 'created_by');
    }

    public function viaturas()
    {     
       return $this->belongsToMany(Viatura::class, 'eventos_viaturas', 'evento_id', 'viatura_id')->withPivot('id', 'km_inicial', 'km_final', 'created_by');
    }

    
}
