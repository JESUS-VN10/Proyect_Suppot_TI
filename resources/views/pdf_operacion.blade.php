<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTA CAMBIO DE INVENTARIO A OPERACION</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 12px;
        }
        h1, h2, h3 {
            text-align: center;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size:12px;
        }
        th{
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            color: aliceblue;
            background-color: #8A2991;
        }
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        .signature {
            margin-top: 40px;
            display:flex;
            flex-direction:row;
        }
        p{
            font-size:11px;
        }
    </style>
</head>
<body>
<script src="{{asset('js/styles.js')}}"></script>
<img src="data:image/png;base64,{{ $rutaLogo }}" alt="" width="30%">

<h3>ACTA CAMBIO DE INVENTARIO A OPERACION</h3>

<p>Señor(@) <b>{{$nombre_encargado}}</b></p>
<p>CC: <b>{{$documento_encargado}}</b></p>
<p>Correo: <b>{{$correo_encargado}}</b></p>


<p>El presente formato se tiene con fin de entregar la responsabilidad del activo solicitado a la operación retirando el activo anterior según el caso: <strong>{{$n_caso}}</strong></p>

<h2>Definiciones:</h2>

<p>Motivo de Solicitud: <b>{{$motivo_solicitud}}</b></p>
<p>Operación Solicitante:  <b>{{$op_solicitante}}</b></p>
<p>Estado de Entrega del Nuevo Activo: <b>{{$est_entrega_nuevoActivo}}</b></p>
<p>Estado de Recibido del Activo Recogido: <b>{{$est_recibido_activo}}</b></p>

<p>Fecha de acta: <b>{{$fecha_entrega}}</b></p>

<h2>Activos relacionados:</h2>

<table class="table">
    <thead>
        <tr>
            <th>Elemento Recogido</th>
            <th>Serial</th>
            <th>Activo</th>
            <th>Observaciones (Estado)</th>
        </tr>
    </thead>
    <tbody>
        <!-- Iterar todos los elementos recogidos -->     
        @foreach ($data_recogido as $elemento)      
        <tr>
            <td>{{$elemento['elemento_recogido']}}</td>
            <td>{{$elemento['serial_recogido']}}</td>
            <td>{{$elemento['activo_recogido']}}</td>
            <td>{{$elemento['observaciones_recogido']}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Elemento Entregado</th>
            <th>Serial</th>
            <th>Activo</th>
            <th>Observaciones (Estado)</th>
        </tr>
    </thead>
    <tbody>
        <!-- Iterar todos los elementos entregados -->
        @foreach ($data_entregado as $entregado)
        
        <tr>
            <td>{{$entregado['elemento_entregado']}}</td>
            <td>{{$entregado['serial_entregado']}}</td>
            <td>{{$entregado['activo_entregado']}}</td>
            <td>{{$entregado['observaciones_entregado']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>Observación: {{$observaciones}}</p>


<div class="signature">
    {{-- Decodificar las imagenes de las firmas --}}
    <table class="table">
        <tr>
            <td>

                <div class="container">
                    <p>Firma de quien entrega: <img src="data:image/png;base64,{{$ruta1}}" alt="" width="100px" height="40px"></p>
                    <p><b>Gestor de soluciones tecnologicas </b></p>
                    <p>Nombre Gestor: <b>{{$nombre_gestor}}</b></p>
                </div>
            </td>
            <td>
                <div class="container">
                    <p>Firma de quien entrega en bodega:<img src="data:image/png;base64,{{$ruta3}}" alt="" width="100px" height="40px"></p>
                    <p><b>Gestor de soluciones tecnologicas </b></p>
                    <p>Nombre encargado: <b>{{$nombre_gestor_bodega}}</b></p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="container">
                    <p>Firma Operación:<img src="data:image/png;base64,{{$ruta2}}" alt="" width="100px" height="40px"></p>
                    <p>Nombre encargado: <b>{{$nombre_encargado}}</b></p>
                    <p>Cargo: <b>{{$cargo_operacion}}</b></p>
                    <p>Nombre Operacion: <b>{{$op_solicitante}}</b></p>
                </div>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
