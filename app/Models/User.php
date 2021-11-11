<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'nome_guerra',
        'posto_grad_id',
        'cpf',
        'data_nascimento',
        'email',
        'telefone1',
        'telefone2',
        'rua',
        'numero',
        'complemento',
        'estado_id',
        'cidade_id',
        'cep',
        'orgao_id',
        'setor_id',
        'perfil_id',
        'nivel_id',
        'observacao',
        'usuario',
        'password',
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }    

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['perfil','orgao','setor','funcao','posto_grad', 'estado', 'cidade', 'nivel', 'veiculos'];


     public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function orgao()
    {
        return $this->belongsTo(Orgao::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }

    public function posto_grad()
    {
        return $this->belongsTo(PostoGrad::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function acessos()
    {
        return $this->hasMany(Acesso::class, 'user_id', 'id');
    }

    public function veiculos()
    {
        return $this->hasMany(UserVeiculo::class, 'user_id', 'id');
    }

    public function eventos()
    {     
       return $this->belongsToMany(Evento::class, 'eventos_users')->withPivot('id', 'user_id', 'evento_id', 'presente', 'data', 'hora', 'created_by');
    }
   
}
