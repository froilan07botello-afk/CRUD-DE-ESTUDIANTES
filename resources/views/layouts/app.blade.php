<!DOCTYPE html>
<html>
<head>
    <title>CRUD Estudiantes</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">
            Sistema de Estudiantes
        </h1>

        <div class="flex gap-2">
            <a href="{{ route('estudiantes.index') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded">
                Estudiantes
            </a>

            <a href="{{ route('carreras.index') }}"
            class="bg-gray-600 text-white px-4 py-2 rounded">
                Carreras
            </a>
        </div>
    </div>

    <!-- MENSAJES -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- CONTENIDO -->
    <div class="bg-white p-6 rounded shadow">
        @yield('content')
    </div>

</div>

</body>
</html>