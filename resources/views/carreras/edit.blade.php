@extends('layouts.app')

@section('content')

<h2>Editar Carrera</h2>
@if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('carreras.update', $carrera->id) }}" method="POST">

    @csrf
    @method('PUT')

   <input type="text" name="nombre"
    value="{{ old('nombre', $carrera->nombre) }}"
    class="w-full border p-2 rounded">  

    <button class="bg-yellow-500 text-white px-4 py-2">
        Actualizar
    </button>

</form>

@endsection