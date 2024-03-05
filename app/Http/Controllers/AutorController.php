<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

/**
 * Class AutorController
 * @package App\Http\Controllers
 */
class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $size= isset($params['size']) ? $params['size'] :1;
        $autors = Autor::select("id",'nombre')->with("libros:titulo,isbn,autor_id")->limit($size)->get();
        return response()->json($autors);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // No se usa para JSON, puedes implementarlo según tus necesidades
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Autor::$rules);

        $autor = Autor::create($request->all());

        return response()->json($autor, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autor::find($id);

        return response()->json($autor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // No se usa para JSON, puedes implementarlo según tus necesidades
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Autor $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        request()->validate(Autor::$rules);

        $autor->update($request->all());

        return response()->json($autor, 200);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $autor = Autor::find($id)->delete();

        return response()->json(null, 204);
    }
}
