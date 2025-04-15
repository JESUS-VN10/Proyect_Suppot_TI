@vite(['resources/js/app.js','resources/css/app.css','resources/sass/app.scss'])
<!DOCTYPE html>
<html>
<head>
  <title>Registro de gestores y campañas</title>
  <link rel="icon" href="{{asset('images/Logo_min.png')}}" type="image/png">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  
</head>
<body style="background-image:url('{{asset('images/5556661.jpg')}}');">
  <div class="bg-white p-3 w-5/6 mx-auto">
    <div style="display:flex;justify-content:space-between;">
      <img src="{{ asset('images/americas.png') }}" alt="Descripción de la imagen" class="logo">
      <div class="p-2">

        <a class="text-purple-800 text-2xl" href="{{route('home')}}"><i class="fa-solid fa-backward"></i>  Volver</a><br>
      </div>
    </div>
    <!-- framework Vue.js -->
    
    <section id="app" class="border-2 grid grid-cols-1 justify-center mt-3 p-3">
      <h2 class="text-3xl p-4 col-span-1 p-3 text-white text-center" style="background: linear-gradient(to right, #0E849C, #5A189A);">Mis actas</h2>
      <tabla-gestor/>
    </section>
    
  </body>
</html>