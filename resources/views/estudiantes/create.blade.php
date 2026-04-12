@extends('layouts.app')
@section('content')

<h2 class="text-xl mb-4">Crear Estudiante</h2>

<form action="{{ route('estudiantes.store') }}" method="POST" class="bg-white p-6 rounded shadow">

    @csrf

    <!-- Nombre -->
    <div class="mb-4">
        <label>Nombre</label>
        <input type="text" name="nombre"
        class="w-full border p-2">
    </div>

    <!-- Correo -->
    <div class="mb-4">
        <label>Correo</label>
        <input type="email" name="correo"
        class="w-full border p-2">
    </div>

    <!-- Carrera -->
    <div class="mb-4">
        <label>Carrera</label>
        <select name="carrera_id" class="w-full border p-2">
            @foreach($carreras as $c)
                <option value="{{ $c->id }}">
                    {{ $c->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Semestre -->
    <div class="mb-4">
        <label>Semestre</label>
        <input type="number" name="semestre"
        class="w-full border p-2">
    </div>

    <button class="bg-blue-500 text-white px-4 py-2">
        Guardar
    </button>

</form>

@endsection