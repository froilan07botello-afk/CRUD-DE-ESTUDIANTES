@extends('layouts.app')

@section('content')

<h2>Crear Carrera</h2>
@if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('carreras.store') }}" method="POST">

    @csrf

   <input type="text" name="nombre"
    value="{{ old('nombre', $carrera->nombre ?? '') }}"
    class="border p-2 rounded">

    <button class="bg-blue-500 text-white px-4 py-2">
        Guardar
    </button>

</form>

@endsection