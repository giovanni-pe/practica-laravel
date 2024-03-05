<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $size= isset($params['size']) ? $params['size'] :1;
        $categorias = Usuario::select("id",'nombre')->with("libros:titulo,isbn")->limit($size)->get();
        return response()->json($categorias);   
    }

    

    public function store(Request $request)
    {
        $validatedData = $request->validate(Usuario::$rules);
        $usuario = Usuario::create($validatedData);
        return response()->json($usuario, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuario not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($usuario);
    }

   
    public function update(Request $request, Usuario $usuario)
    {
        $validatedData = $request->validate(Usuario::$rules);
        $usuario->update($validatedData);
        return response()->json($usuario, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuario not found'], Response::HTTP_NOT_FOUND);
        }
        $usuario->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
