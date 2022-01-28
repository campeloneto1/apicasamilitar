<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garagem extends Model
{

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'garagem';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_veiculo_id',
        'data',
        'hora',
        'posto_id',    
        'orgao_id',
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
    protected $with = ['orgao','posto', 'user', 'veiculo', 'responsavel'];

    public function orgao()
    {
        return $this->belongsTo(Orgao::class);
    }

    public function posto()
    {
        return $this->belongsTo(Posto::class);
    }

    public function user()
    {     
       return $this->hasManyThrough(
        User::class, 
        UserVeiculo::class,
        'id', // Foreign key on the cars table...
        'id', // Foreign key on the owners table...
        'user_veiculo_id', // Local key on the mechanics table...
        'user_id' // Local key on the cars table...
        );
    }

    public function veiculo()
    {     
       return $this->belongsTo(UserVeiculo::class, 'user_veiculo_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
