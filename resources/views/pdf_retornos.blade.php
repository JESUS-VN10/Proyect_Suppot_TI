<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTA DE RETORNO DE EQUIPOS</title>
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
        th {
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
            display: flex;
            flex-direction: row;
        }
        p {
            font-size: 11px;
        }
        .firmas_p {
            font-size: 15px;
        }
    </style>
</head>
<body>
<script src="{{asset('js/styles.js')}}"></script>
<img src="data:image/png;base64,{{$rutaLogo}}" alt="Logo" width="30%">

<h3>ACTA DE RETORNO DE EQUIPOS</h3>

<p>Número de Caso: <b>{{$numeroCaso}}</b></p>
<p>Nombre: <b>{{$nombres}}</b></p>
<p>Campaña: <b>{{$campana}}</b></p>
<p>Correo Personal: <b>{{$correoPersonal}}</b></p>
<p>Correo del Jefe: <b>{{$correoJefe}}</b></p>

<h2>Detalles del Dispositivo</h2>

<table>
    <tr>
        <th>Marca del Dispositivo</th>
        <td>{{$marcaDispositivo}}</td>
        <th>Modelo del Dispositivo</th>
        <td>{{$modeloDispositivo}}</td>
    </tr>
   
    <tr>
        <th>Tipo de Dispositivo</th>
        <td>{{$dispositivo}}</td>
        <th>Tipo de Escritorio</th>
        <td>{{$Tipoescritorio ?? 'N/A'}}</td>
    </tr>
    <tr>
        <th>Serial del Dispositivo</th>
        <td>{{$serialDispositivo}}</td>
        <th>Activo del Dispositivo</th>
        <td>{{$activoDispositivo}}</td>
    </tr>
    <tr>
        <th>Estado del Dispositivo</th>
        <td>{{$estadoDispositivo}}</td>
        <th>Marca del Monitor</th>
        <td>{{$marcaMonitor}}</td>
    </tr>
    <tr>
        <th>Modelo del Monitor</th>
        <td>{{$modeloMonitor}}</td>
        <th>Serial del Monitor</th>
        <td>{{$serialMonitor}}</td>
    </tr>
    <tr>
        <th>Activo del Monitor</th>
        <td>{{$activoMonitor}}</td>
        <th>Estado del Monitor</th>
        <td>{{$estadoMonitor}}</td>
    </tr>
</table>

<h2>Periféricos</h2>

<table>
    <tr>
        <th>Ratón</th>
        <td>{{$raton}}</td>
        <th>Estado del Ratón</th>
        <td>{{$estadoRaton ?? 'N/A'}}</td>
    </tr>
    <tr>
        <th>Teclado</th>
        <td>{{$teclado}}</td>
        <th>Estado del Teclado</th>
        <td>{{$estadoTeclado ?? 'N/A'}}</td>
    </tr>
    <tr>
        <th>Diadema</th>
        <td>{{$diadema}}</td>
        <th>Marca de la Diadema</th>
        <td>{{$marcaDiadema ?? 'N/A'}}</td>
    </tr>
    <tr>
        <th>Serial de la Diadema</th>
        <td>{{$serialDiadema ?? 'N/A'}}</td>
        <th>Estado de la Diadema</th>
        <td>{{$estadoDiadema ?? 'N/A'}}</td>
    </tr>
    <tr>
        <th>Cámara</th>
        <td>{{$camara}}</td>
        <th>Segundo Monitor</th>
        <td>{{$segundoMonitor}}</td>
    </tr>
</table>

@if($segundoMonitor === 'Si')
<h2>Detalles del Segundo Monitor</h2>
<table>
<tr>
        <th>Marca del Monitor2</th>
        <td>{{$marcaMonitor2}}</td>
        <th>Modelo del Monitor2</th>
        <td>{{$modeloMonitor2}}</td>
    </tr>
    <tr>
        <th>Serial del Segundo Monitor</th>
        <td>{{$serialMonitor2}}</td>
        <th>Activo del Segundo Monitor</th>
        <td>{{$activoMonitor2}}</td>
    </tr>
</table>
@endif

<h2>Observaciones</h2>
<p>{{$observaciones}}</p>
<p>El presente documento confirma la recepción de equipos tecnológicos asignados al <b>TRABAJADOR</b>, los cuales están
    sujetos a validaciones técnicas dentro de un plazo de dos (2) días hábiles. Si no se emite un reporte en este
    periodo, se considerará que los equipos han sido recibidos a satisfacción. En caso de daños ocasionados por mala
    manipulación, se aplicarán descuentos según la valorización del equipo.
    Cualquier desperfecto detectado durante las validaciones será notificado inmediatamente al jefe inmediato o
    responsable de la entrega para que se tomen las acciones correspondientes. EL TRABAJADOR autoriza que, en caso
    de pérdida, extravío, daño o destrucción de cualquiera de los elementos por cualquier motivo, le sea deducido o
    descontado el valor comercial del equipo de cómputo, generando la deducción de las sumas que se le adeuden por
    salarios, prestaciones sociales, vacaciones, intereses de cesantía, pagos de naturaleza extralegal, eventuales
    indemnizaciones y cualquier otra acreencia a la que pueda tener derecho durante la vigencia del contrato de
    trabajo o al momento de la terminación del mismo por cualquier motivo.</p>

<div class="signature">
    <table>
        <tr>
            <td>
                <div class="container">
                    <p class="firmas_p">Firma de quien entrega: <img src="data:image/png;base64,{{$ruta1}}" alt="" width="100px" height="40px"></p>
                    <p class="firmas_p">Nombre: <b>{{$nombres}}</b></p>
                </div>
            </td>
            <td>
                <div class="container">
                    <p class="firmas_p">Firma de quien recibe: <img src="data:image/png;base64,{{$ruta2}}" alt="" width="100px" height="40px"></p>
                    <p class="firmas_p">Nombre Gestor: <b>{{$nombreRecibe}}</b></p>
                </div>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
