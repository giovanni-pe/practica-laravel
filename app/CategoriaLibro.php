<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriaLibro
 *
 * @property $id
 * @property $categoria_id
 * @property $libro_id
 *
 * @property Categoria $categoria
 * @property Libro $libro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriaLibro extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','libro_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Libro', 'id', 'libro_id');
    }
    

}
