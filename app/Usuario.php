<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usuario
 *
 * @property $id
 * @property $nombre
 * @property $email
 * @property $password
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property LibroUsuario[] $libroUsuarios
 * @property Resena[] $resenas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libroUsuarios()
    {
        return $this->hasMany('App\LibroUsuario', 'usuario_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resenas()
    {
        return $this->hasMany('App\Resena', 'usuario_id', 'id');
    }
    

}
