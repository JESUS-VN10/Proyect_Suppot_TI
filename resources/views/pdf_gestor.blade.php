<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <img src="data:image/png;base64,{{ $rutaLogo }}" alt="" width="30%">
    <title>ACTA DE RESPONSABILIDAD AL GESTOR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 12px;
        }
        h1, h2, h3 {
            text-align: center;
            font-size:14px;
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
            font-size:11px
        }
    </style>
</head>
<body>

<h3>ACTA DE RESPONSABILIDAD AL GESTOR</h3>

<p>Señor (@): <b>{{$nombre_persona}}</b></p>
<p>CC: <b>{{$documento_persona}}</b></p>
<p>Correo: <b>{{$correo_persona}}</b></p>

<p>El presente formato se tiene con fin de entregar la responsabilidad del activo solicitado al gestor: <b>{{$nombre_gestor}}</b></p>

<h2>Definiciones:</h2>

<p>Motivo de Solicitud: <b>{{$motivo_solicitud}}</b></p>
<p>Operación Solicitante: <b>{{$op_solicitante}}</b></p>
<p>Numero Caso: <b>{{$numero_caso}}</b></p>
<p>Fecha de acta: <b>{{$fecha_entregaActivo}}</b></p>

<h2>Activos relacionados:</h2>

<table class="table">
    <thead>
        <tr>
            <th>Elemento</th>
            <th>Serial</th>
            <th>Activo</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Agregar filas según sea necesario -->
        @foreach ($data_elemento as $data)
        
        <tr>
            <td>{{$data['ingreso_elemento']}}</td>
            <td>{{$data['serial_elemento']}}</td>
            <td>{{$data['activo_elemento']}}</td>
            <td>{{$data['observaciones_elemento']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- Tabla de elementos recogidos --}}
<table class="table">
    <thead>
        <tr>
            <th>Elemento</th>
            <th>Serial</th>
            <th>Activo</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Agregar filas según sea necesario -->
        @foreach ($data_elemento_r as $data)
        
        <tr>
            <td>{{$data['ingreso_elemento']}}</td>
            <td>{{$data['serial_elemento']}}</td>
            <td>{{$data['activo_elemento']}}</td>
            <td>{{$data['observaciones_elemento']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>Observación: Con la firma de esta acta el gestor que solicita el elemento se hará responsable de este en su totalidad hasta que sea entregada a la operación la cual deberá de ser certificada por un acta de entrega similar, firmada por la operación y cargada a GLPI.</p>

<div class="signature">
    <table class="table">
        <tr>
            <td>
                
                <div class="container">
            
                    <p>Firma de quien entrega: <img src="data:image/png;base64,{{$ruta1}}" alt="" width="30%"></p>
                    <p>Gestor de Soluciones Tecnológica</p>
                    <p>Nombre: <b>{{$nombre_persona}}</b></p>
                </div>
            </td>
            <td>
                <div class="container">
            
                    <p>Firma de quien recibe: <img src="data:image/png;base64,{{$ruta2}}" alt="" width="30%"></p>
                    <p>Gestor de Soluciones Tecnológica</p>
                    <p>Nombre: <b>{{$nombre_gestor}}</b></p>
                </div>

            </td>
        </tr>
    </table>
    <br>
</div>
</body>
<script src="{{asset('js/styles.js')}}"></script>
</html>
