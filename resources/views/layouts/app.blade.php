<!DOCTYPE html>
<html>
<head>
    <title>CRUD Estudiantes</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">
        Sistema de Estudiantes
    </h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="bg-green-200 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Contenido dinámico --}}
    @yield('content')

</div>

</body>
</html>