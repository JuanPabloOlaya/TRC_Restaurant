@extends('menu')

@section('textoAqui')
<div class="card-columns">

  @foreach ($orp as $p)
  <div class="card">
  <img height="400" src="{{ asset('img/Productos') }}/{{ $p->foto_producto }}" class="card-img-top" alt="...">
      <div class="card-body">
      <p class="card-text">Nombre: <b>{{ $p->nombre_producto }}</b></p>
      <p class="card-text">Precio: <b>{{ $p->precio_producto }}</b></p>
      <p class="card-text">Descripción: {{ $p->descripcion_producto }}</p>
      <form id="form_actions" action="{{ route('producto.destroy', $p->id) }}" method="post" onsubmit="return confirm('¿Deseas eliminar este Producto?');">
          @method("DELETE")
          @csrf
          <a class="btn btn-link" href="{{ route('producto.show', $p->id) }}"><img src="{{ asset('css/svg/eye.svg') }}"
                  alt=""></a>
          <a class="btn btn-link" href="{{ route('producto.edit', $p->id) }}"><img src="{{ asset('css/svg/sync.svg') }}"
                  alt=""></a>
          <button type="submit" id="btnDelete" class="btn btn-link">
              <img src="{{ asset('css/svg/x.svg') }}" alt="">
          </button>
      </form>
      </div>
  </div>
  @endforeach
</div>
<div class="row justify-content-center">
  {{ $orp->links() }}
</div>

@endsection