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
                                <th>Cantidad de productos</th>
                                <th>Valor Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>17-11-2019 13:30:00</td>
                                <td>3</td>
                                <td>$ 15.000</td>
                                <td>
                                    <a id="4" href="#" onclick="elaborar('4')">Elaborar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>17-11-2019 13:30:00</td>
                                <td>3</td>
                                <td>$ 15.000</td>
                                <td>
                                    <a id="5" href="#" onclick="elaborar('5')">Elaborar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>17-11-2019 13:30:00</td>
                                <td>3</td>
                                <td>$ 15.000</td>
                                <td>
                                    <a id="6" href="#" onclick="elaborar('6')">Elaborar</a>
                                </td>
                            </tr>
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
                                <th>Cantidad de productos</th>
                                <th>Valor Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>17-11-2019 13:30:00</td>
                                <td>3</td>
                                <td>$ 15.000</td>
                                <td>
                                    <a id="2" href="#" onclick="terminar('2')">Terminar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>17-11-2019 13:30:00</td>
                                <td>3</td>
                                <td>$ 15.000</td>
                                <td>
                                    <a id="3" href="#" onclick="terminar('3')">Terminar</a>
                                </td>
                            </tr>
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
                                <th>Cantidad de productos</th>
                                <th>Valor Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>17-11-2019 13:30:00</td>
                                <td>3</td>
                                <td>$ 15.000</td>
                                <td>
                                    <a id="1" href="#" onclick="notificar('1')">Notificar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function elaborar($id)
        {
            var parent = $("#" + $id).parents("tr");
            $("#" + $id).parents("tr").slideDown('normal',function(){
                $(this).remove();
            });

            $("table#tHaciendo").children("tbody").append(parent);
            $("table#tHaciendo tbody tr td a#" + $id).attr("onclick","terminar('" + $id + "')");
            $("table#tHaciendo tbody tr td a#" + $id).text("Terminar");
        }
        function terminar($id)
        {
            var parent = $("#" + $id).parents("tr");
            $("#" + $id).parents("tr").remove();

            $("table#tTerminado").children("tbody").append(parent);
            $("table#tTerminado tbody tr td a#" + $id).attr("onclick","notificar('" + $id + "')");
            $("table#tTerminado tbody tr td a#" + $id).text("Notificar");
        }
        function notificar($id)
        {
            alert("Un nuevo pedido esta listo para entregar!!");
        }
    </script>
@endsection