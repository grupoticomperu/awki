<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el cliente a buscar">
    </div>

@if($clientes->count())

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente )
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nombres}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.clientes.edit', $cliente)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.clientes.destroy', $cliente)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$clientes->links()}}
    </div>

@else
    <div class="card-body">
        <strong>No hay Clientes</strong>
    </div>
   

@endif
</div>
