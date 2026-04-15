@extends('layouts.app')

@section('content')
<!Vista principal en la cual listamos las carreras existentes>
<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">Lista de Carreras</h2>

    <a href="{{ route('carreras.create') }}"
    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        + Nueva Carrera
    </a>
</div>

<table class="w-full border rounded overflow-hidden">

<thead class="bg-gray-200">
<tr>
    <th class="p-2 text-left">ID</th>
    <th class="p-2 text-left">Nombre</th>
    <th class="p-2 text-center">Acciones</th>
</tr>
</thead>

<tbody>
<!llenamos nuestra tabla , la variable carreras viene del controlador la cual hace la consulta a la bd y nos trae los datos para listarlos>
@forelse($carreras as $c)
<tr class="border-t hover:bg-gray-50">
    <td class="p-2">{{ $c->id }}</td>
    <td class="p-2">{{ $c->nombre }}</td>
    <td class="p-2 flex gap-2 justify-center">
        <!btn editar>
        <a href="{{ route('carreras.edit', $c->id) }}"
        class="bg-yellow-400 px-3 py-1 rounded hover:bg-yellow-500">
            Editar
        </a>

        <!btn eliminar>
        <form action="{{ route('carreras.delete', $c->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('¿Eliminar carrera?')"
            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                Eliminar
            </button>
        </form>

    </td>

</tr>

@empty
<tr>
    <td colspan="3" class="text-center p-4 text-gray-500">
        No hay carreras registradas
    </td>
</tr>
@endforelse

</tbody>

</table>

@endsection