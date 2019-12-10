@extends('menu')

@section('textoAqui')
    
    <div class="container-fluid shadow p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col">
                <h5 class="center">En Espera</h5>
                <div class="table-responsive text-center">
                    <table id="tEspera" class="table table-bordered">
                        <thead class="table-danger">
                            <tr>
                                <th>Fecha del Pedido</th>
                                <th>Valor Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tBodyEspera">
                            @foreach ($orp as $p)
                                @if ($p->estado_pedido == "EN ESPERA")
                                    <tr>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->valor_total_pedido }}</td>
                                        <td>
                                        <a id="{{ $p->id }}" href="#" onclick="elaborar('{{ $p->id }}')">Elaborar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h5 class="center">Elaborandose</h5>
                <div class="table-responsive text-center">
                    <table id="tHaciendo" class="table table-bordered">
                        <thead class="table-warning">
                            <tr>
                                <th>Fecha del Pedido</th>
                                <th>Valor Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tBodyProceso">
                            @foreach ($orp as $p)
                                @if ($p->estado_pedido == "EN PROCESO")
                                    <tr>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->valor_total_pedido }}</td>
                                        <td>
                                        <a id="{{ $p->id }}" href="#" onclick="terminar('{{ $p->id }}')">Terminar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h5 class="center">Para Entregar</h5>
                <div class="table-responsive text-center">
                    <table id="tTerminado" class="table table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>Fecha del Pedido</th>
                                <th>Valor Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tBodyEntregar">
                            
                            @foreach ($orp as $p)
                                @if ($p->estado_pedido == "PARA ENTREGAR")
                                    <tr>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->valor_total_pedido }}</td>
                                        <td>
                                        <a id="{{ $p->id }}" href="#" onclick="notificar('{{ $p->id }}')">Notificar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
      
        function elaborar(id)
        {

            $.get(
                "<?php echo route('CambiarEstadoPed');?>" + "/" + id,
                $(this).serialize(),
                function(data)
                {
                    var obj = JSON.parse(data);
                    if (obj.respuesta == "1")
                    {
                        $("#tBodyEspera").empty();
                        $("#tBodyProceso").empty();
                        $("#tBodyEntregar").empty();
                        obj.pedidos.forEach(element => {
                            if(element.estado_pedido == "EN ESPERA")
                            {
                                $("#tBodyEspera").append("<tr><td>" + element.created_at + "</td><td>" + element.valor_total_pedido + "</td><td><a id='" + element.id + "' onclick='elaborar(" + element.id + ")'>Elaborar</a></td></tr>");
                            }
                            if(element.estado_pedido == "EN PROCESO")
                            {
                                $("#tBodyProceso").append("<tr><td>" + element.created_at + "</td><td>" + element.valor_total_pedido + "</td><td><a id='" + element.id + "' onclick='terminar(" + element.id + ")'>Terminar</a></td></tr>");
                            }
                            if(element.estado_pedido == "PARA ENTREGAR")
                            {
                                $("#tBodyEntregar").append("<tr><td>" + element.created_at + "</td><td>" + element.valor_total_pedido + "</td><td><a id='" + element.id + "' onclick='notificar(" + element.id + ")'>Notificar</a></td></tr>");
                            }
                        });
                        swal("Pedido Actulizado!", "Presiona el botón!", "success");
                    }
                    else
                    {
                        swal("No llego");
                    }
                }
            );
            var parent = $("#" + id).parents("tr");
            $("#" + id).parents("tr").slideDown('normal',function(){
                $(this).remove();
            });

            $("table#tHaciendo").children("tbody").append(parent);
            $("table#tHaciendo tbody tr td a#" + id).attr("onclick","terminar('" + id + "')");
            $("table#tHaciendo tbody tr td a#" + id).text("Terminar");
        }
        function terminar(id)
        {
            $.get(
                "<?php echo route('CambiarEstadoPed');?>" + "/" + id,
                $(this).serialize(),
                function(data)
                {
                    console.log(data);
                    var obj = JSON.parse(data);
                    if (obj.respuesta == "1")
                    {
                        $("#tBodyEspera").empty();
                        $("#tBodyProceso").empty();
                        $("#tBodyEntregar").empty();
                        obj.pedidos.forEach(element => {
                            if(element.estado_pedido == "EN ESPERA")
                            {
                                $("#tBodyEspera").append("<tr><td>" + element.created_at + "</td><td>" + element.valor_total_pedido + "</td><td><a id='" + element.id + "' onclick='elaborar(" + element.id + ")'>Elaborar</a></td></tr>");
                            }
                            if(element.estado_pedido == "EN PROCESO")
                            {
                                $("#tBodyProceso").append("<tr><td>" + element.created_at + "</td><td>" + element.valor_total_pedido + "</td><td><a id='" + element.id + "' onclick='terminar(" + element.id + ")'>Terminar</a></td></tr>");
                            }
                            if(element.estado_pedido == "PARA ENTREGAR")
                            {
                                $("#tBodyEntregar").append("<tr><td>" + element.created_at + "</td><td>" + element.valor_total_pedido + "</td><td><a id='" + element.id + "' onclick='notificar(" + element.id + ")'>Notificar</a></td></tr>");
                            }
                        });
                        swal("Pedido Actulizado!", "Presiona el botón!", "success");
                    }
                    else
                    {
                        swal("No llego");
                    }
                }
            );

            var parent = $("#" + id).parents("tr");
            $("#" + id).parents("tr").remove();

            $("table#tTerminado").children("tbody").append(parent);
            $("table#tTerminado tbody tr td a#" + id).attr("onclick","notificar('" + id + "')");
            $("table#tTerminado tbody tr td a#" + id).text("Notificar");
        }
        function notificar(id)
        {
            swal("Un nuevo pedido esta listo para entregar!!");
        }
    </script>
@endsection