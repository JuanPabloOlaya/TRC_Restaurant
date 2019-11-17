@extends('menu')

@section('textoAqui')
<div class="container shadow p-3 mb-5 bg-white rounded">
    <h1 class="center">Bienvenido a la Papeleria Don Chucho</h1>

    <h2>Usted ingreso como: Usuario Principal</h2>
    <h2>Su correo es: admin@papeleria.com</h2>
    <h2>Su rol es: Administrador</h2>
    <br>
    <br>
    <center>
        <img src="{{ asset('img/Principal.jpg') }}" alt="" width="500" height="300">
    </center>
</div>
@endsection