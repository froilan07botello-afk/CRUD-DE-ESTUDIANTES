<h1>Lista de estudiantes</h1>

<table border="1">
</a>
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Semestre</th>
    </tr>

    @foreach($estudiantes as $e)
    <tr>
        <td>{{ $e->nombre }}</td>
        <td>{{ $e->correo }}</td>
        <td>{{ $e->semestre }}</td>

        <td>
        <a href="{{ route('estudiantes.edit', $e->id) }}"
        class="bg-yellow-400 px-2">
        Editar
        </td>
    </tr>
    @endforeach
    
</table>