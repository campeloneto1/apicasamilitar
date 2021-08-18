<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locais';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'orgao_id',
        'andar_id',
        'sala',
        
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
    protected $with = ['usuarios'];


     public function usuarios()
    {
        return $this->hasMany('App\Models\User','funcao_id');
    } **/
}
