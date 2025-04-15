@vite(['resources/js/app.js','resources/css/app.css'])

<!DOCTYPE html>
<html>
<head>
  <title>Acta de Responsabilidad de Equipos de Trabajo</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('images/Logo_min.png')}}" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body style="background-image:url('{{asset('images/5556661.jpg')}}');">
  <div class="bg-white  p-3 w-5/6 mx-auto">
    <div style="display:flex;justify-content:space-between;">
      <img src="{{ asset('images/americas.png') }}" alt="Descripción de la imagen" class="logo">

    </div>
    
    <h2 class="text-4xl">ACTAS</h2>
    
    
    <!-- framework Vue.js -->
    
    <div id="app">
      <div>
        <navbar-actas/>
      </div>
      <label for="option">Seleccione una opción:</label>
      <select id="option" v-model.number="seleccion_operacion" class="mt-2 p-2 rounded-md bg-purple-50 bg-opacity-70">
        {{-- <option value="1">ACTA DE RESPONSABILIDAD AL GESTOR</option> --}}
        <option class="mt-2 p-3" value="2">ACTA DE CAMBIO A INVENTARIO DE OPERACION</option>
        <option class="mt-2 p-3" value="3">ACTA DE RETORNOS DE EQUIPO</option>
        <option class="mt-2 p-3" value="4">ACTA DE ENTREGAS DE EQUIPO</option>
        <option class="mt-2 p-3" value="5">ACTA DE ASIGNACIÓN MASIVA SITE</option>
      </select>
      <!-- Componentes de formularios -->
      <form-operacion  class="p-2" v-if="seleccion_operacion===2"></form-operacion>
      <form-retorno  class="p-2" v-if="seleccion_operacion===3"></form-retorno>
      <form-entregas class="p-2" v-if="seleccion_operacion===4"></form-entregas>
      <form-aprobaciones class="p-2" v-if="seleccion_operacion===5"></form-aprobaciones>
    </div>
</body>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</html>