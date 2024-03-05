<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    public function index(Request $request, Response $response){
    
        $params = $request->all();
        $size = isset($params['size']) ? $params['size'] : 1;
        $autors = Libro::select("id", 'titulo','isbn','autor_id')->with("autor:id,nombre")->limit($size)->get();
        return response()->json($autors);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate(Libro::$rules);
        $libro = Libro::create($validatedData);
        return response()->json($libro, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($libro);
    }


    public function update(Request $request, Libro $libro)
    {
        $validatedData = $request->validate(Libro::$rules);
        $libro->update($validatedData);
        return response()->json($libro, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }
        $libro->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}