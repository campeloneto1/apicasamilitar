<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acessos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
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
    protected $with = ['orgao','posto', 'user', 'responsavel'];

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
        return $this->belongsTo(User::class);
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
   
}
