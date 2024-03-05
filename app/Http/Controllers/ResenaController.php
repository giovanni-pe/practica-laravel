<?php

namespace App\Http\Controllers;

use App\Resena;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ResenaController
 * @package App\Http\Controllers
 */
class ResenaController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $size = isset($params['size']) ? $params['size'] : 1;
        $resenas = Resena::select("id", 'contenido',"usuario_id","libro_id")->with(["usuario:id,nombre,email",'libro.autor:id,nombre'])->limit($size)->get();
        return response()->json($resenas);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate(Resena::$rules);
        $resena = Resena::create($validatedData);
        return response()->json($resena, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $resena = Resena::find($id);
        if (!$resena) {
            return response()->json(['error' => 'Resena not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($resena);
    }



    public function update(Request $request, Resena $resena)
    {
        $validatedData = $request->validate(Resena::$rules);
        $resena->update($validatedData);
        return response()->json($resena, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $resena = Resena::find($id);
        if (!$resena) {
            return response()->json(['error' => 'Resena not found'], Response::HTTP_NOT_FOUND);
        }
        $resena->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
