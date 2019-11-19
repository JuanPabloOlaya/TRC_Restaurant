<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Productos/insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|image',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $foto = time() . $file->getClientOriginalName();
            $file->move(public_path().'/img/Productos/', $foto);
        }

        $ip = new App\Producto();
        $ip->nombre_producto = $request->name;
        $ip->descripcion_producto = $request->description;
        $ip->precio_producto = $request->price;
        $ip->foto_producto = $foto;

        $ip->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Selecciona todos los productos.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showAll($from = FALSE)
    {
        $orp = App\Producto::all();
        if ($from != FALSE) {
            echo json_encode($orp);
        }
        else {
            return view('Productos/view',compact('orp'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
