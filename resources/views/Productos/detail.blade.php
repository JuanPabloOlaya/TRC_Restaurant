@extends('menu')

@section('textoAqui')

<div class="container shadow p-3 mb-5 bg-white rounded">
    <form action="{{ route('producto.update',$orp->id) }}" method="POST" enctype="multipart/form-data" class="container shadow p-3 mb-5 bg-white rounded">
        @method('PUT')
        @csrf
        <div class="text-center titulo">
            <h1>Detalles Producto</h1>
        </div>
        <br>
        <div class="row justify-content-center">
                <img width="250" height="250" src="{{ asset('img/Productos') }}/{{ $orp->foto_producto }}" alt="...">
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="name">Nombre</label>
                <label type="text" class="form-control" id="name" name="name">
                {{ $orp->nombre_producto }}</label>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="price">Precio</label>
            <label type="text" class="form-control" id="price" name="price"> 
                {{ $orp->precio_producto }}</label>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="description">Descrpcion</label>
                <p class="form-control" id="description" name="description">{{ $orp->descripcion_producto }}</p>
            </div>
        </div>
</div>
@endsection