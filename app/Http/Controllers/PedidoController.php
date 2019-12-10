<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orp = App\Pedido::all();

        return view('Pedidos/view',compact('orp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['id'] = $id;
        echo json_encode($data);
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

    public function cambiarEstado($id = FALSE)
    {
        if ($id != false && $id > 0)
        {
            $p = App\Pedido::FindOrFail($id);

            switch ($p->estado_pedido) {
                case 'EN ESPERA':
                    $p->estado_pedido = 'EN PROCESO';
                    $p->update();

                    $orp = App\Pedido::all();
                    $data['pedidos'] = $orp;

                    break;
                
                case 'EN PROCESO':

                    $p->estado_pedido = 'PARA ENTREGAR';
                    $p->update();

                    $orp = App\Pedido::all();
                    $data['pedidos'] = $orp;

                    break;

                case 'PARA ENTREGAR':

                    
                    break;
            }
            $data['respuesta'] = '1';
        }
        else {
            $data['respuesta'] = '0';
        }

        echo json_encode($data);
    }
}
