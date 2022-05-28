@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="col-sm-6">
    <h1 class="m-0">Todos los Clientes </h1>
    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> </i> Crear Clientes</button>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-header">
     
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="clientes-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nombres</th>
              <th>DNI</th>
              <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombres}}</td>
                        <td>{{ $cliente->dni }}</td>
                        <td>
                        
                          @can('admin.clientes.show')
                            <a href="{{ route('admin.clientes.show', $cliente)}}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i></a>
                          @endcan
                          @can('admin.clientes.edit')
                            <a href="{{ route('admin.clientes.edit', $cliente)}}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                          @endcan
                          
                            <a href="" class="btn btn-xs btn-danger"><i class="fas fa-times-circle"></i></a> 



                        </td>
                    </tr>
                                    
                @endforeach

            </tbody>

            <tfoot>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Resumen</th>
              <th>Acciones</th>
              
            </tr>
            </tfoot>
          </table>
    </div>
    <!-- /.card-body -->
  </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script src="/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>
      $(function () {
     
        $('#clientes-table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.clientes.store') }}">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar un Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group {{ $errors->has('nombres') ? 'text-danger' : '' }}">
                        <label for="nombres">Nombres y Apellidos</label>
                        <input name="nombres" type="text" class="form-control" id="nombres" placeholder="Ingrese el nombre del cliente">
                        {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Crear Cliente</button>
            </div>
          </div>
        </div>
    </form>  
  </div>

@stop