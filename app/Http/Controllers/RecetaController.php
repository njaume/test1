<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Receta;
use Session;
use DB;
use Redirect;


class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         $receta = Receta::all();
         return view('receta.index',compact('receta'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('receta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
         //id, descripcion_r, precio, costo,id_tipo_receta
        $receta = new Receta;

        $receta->descripcion_r = $request->descripcion_r;
        $receta->precio = $request->precio;
        $receta->costo = $request->costo; 
        $receta->id_tipo_receta = $request->id_tipo_receta; 
        
        $receta->save();

         return redirect('/receta')->with('message','receta guardado correctamente ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $receta = Receta::find($id);
        return view('receta.edit', ['receta'=>$receta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $receta = Receta::find($id);
        $receta->fill($request->all());
        $receta->save();

        Session::flash('message','receta editado correctamente');
        return Redirect::to('/receta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $receta = Receta::find($id);
        $receta->delete();
        Session::flash('message','receta eliminado correctamente');
        return Redirect::to('receta');
    }
}
