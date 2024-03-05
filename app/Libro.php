<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Libro
 *
 * @property $id
 * @property $titulo
 * @property $isbn
 * @property $autor_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Autor $autor
 * @property CategoriaLibro[] $categoriaLibros
 * @property LibroUsuario[] $libroUsuarios
 * @property Resena[] $resenas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Libro extends Model
{
    use SoftDeletes;

    static $rules = [
		'titulo' => 'required',
		'isbn' => 'required',
		'autor_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','isbn','autor_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriaLibros()
    {
        return $this->hasMany('App\CategoriaLibro', 'libro_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libroUsuarios()
    {
        return $this->hasMany('App\LibroUsuario', 'libro_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resenas()
    {
        return $this->hasMany('App\Resena', 'libro_id', 'id');
    }
    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }
    

}
