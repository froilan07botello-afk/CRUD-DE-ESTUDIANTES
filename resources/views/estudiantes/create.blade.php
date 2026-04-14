@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Nuevo Estudiante</h2>

@if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('estudiantes.store') }}" method="POST" class="space-y-4 " >

    @csrf

    <input type="text" name="nombre" placeholder="Nombre"
    value="{{ old('nombre') }}"
    class="w-full border p-2 rounded">

    <input type="email" name="correo" placeholder="Correo"
    value="{{ old('correo') }}"
    class="w-full border p-2 rounded">

    <select name="carrera_id" class="w-full border p-2 rounded">
        @foreach($carreras as $c)
            <option value="{{ $c->id }}">
                {{ $c->nombre }}
            </option>
        @endforeach
    </select>

    <input type="number" name="semestre" placeholder="Semestre"
    value="{{ old('semestre') }}"
    class="w-full border p-2 rounded">

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Guardar
    </button>

</form>

@endsection