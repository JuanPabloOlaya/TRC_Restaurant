@extends('menu')

@section('textoAqui')

<div class="container shadow p-3 mb-5 bg-white rounded">
    <form action="{{ route('producto.update',$orp->id) }}" method="POST" enctype="multipart/form-data" class="container shadow p-3 mb-5 bg-white rounded">
        @method('PUT')
        @csrf
        <div class="text-center titulo">
            <h1>Actualizar Producto</h1>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $orp->nombre_producto }}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="price">Precio</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $orp->precio_producto }}">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="description">Descrpcion</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $orp->descripcion_producto }}</textarea>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="description">Foto</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="photo">
                    <input type="hidden" name="fotoAct" value="{{ $orp->foto_producto }}">
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>
        </div>
        <br>
        <div id="form-result"></div>
        <br>
        <center>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-outline-primary">Agregar</button>
            </div>
        </center>
    </form>
</div>
@endsection