@extends('layouts.app')

@section('content')

<!Vista principal en la cual mostramos a los estudiantes que hay en la BD>
<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">Lista de Estudiantes</h2>

    <a href="{{ route('estudiantes.create') }}"
    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        + Nuevo
    </a>
</div>

<table class="w-full border rounded overflow-hidden">
<thead class="bg-gray-200">
<tr>
    <th class="p-2 text-left">Nombre</th>
    <th class="p-2 text-left">Correo</th>
    <th class="p-2 text-left">Carrera</th>
    <th class="p-2 text-left">Semestre</th>
    <th class="p-2 text-center">Acciones</th>
</tr>
</thead>

<tbody>
<!mediante  el for llenamos los campos de nuestra tabla, la variable estudiantes es la que tenemos en nuestro controlador el cual hace la consulta, despues ser renombra y llena cada campo>
@forelse($estudiantes as $e) 
<tr class="border-t hover:bg-gray-50">
    <td class="p-2">{{ $e->nombre }}</td>
    <td class="p-2">{{ $e->correo }}</td>
    <td class="p-2">{{ $e->carrera->nombre }}</td>
    <td class="p-2">{{ $e->semestre }}</td>


    <td class="p-2 flex gap-2 justify-center">
        <a href="{{ route('estudiantes.edit', $e->id) }}"
        class="bg-yellow-400 px-3 py-1 rounded hover:bg-yellow-500">
            Editar
        </a> 
        <!formulario que nos acciona el metodo de eliminar>
        <form action="{{ route('estudiantes.delete', $e->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('¿Eliminar?')"
            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                Eliminar
            </button>
        </form>

    </td>
</tr>

@empty
<!mensaje en caso de no haber estudiantes registrados>
<tr>
    <td colspan="5" class="text-center p-4 text-gray-500">
        No hay estudiantes registrados
    </td>
</tr>
@endforelse

</tbody>

</table>

@endsection