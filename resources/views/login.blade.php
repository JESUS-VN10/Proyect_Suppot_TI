@vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Login</title>
</head>

<body>
    <style>

.bg-custom {
            background: rgb(150,47,164);
            background: linear-gradient(0deg, rgba(150,47,164,1) 0%, rgba(92,30,157,1) 100%);
            background-size: cover;
            background-position: center;
        }
    </style>
    
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(150,47,164);
            background: linear-gradient(0deg, rgba(150,47,164,1) 0%, rgba(92,30,157,1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .input-group i {
            position: absolute;
            left: 12px;
            top: 12px;
            color: #888;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #AD1A8C;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #830724;
        }
    </style> -->
    <div id="app">
        {{-- Utilizar vue --}}
        <login />
    </div>
</body>

</html>
