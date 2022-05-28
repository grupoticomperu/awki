@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0">Datos del Cliente</h1>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">
            </i> Crear Publicación</button>
    </div>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>

    @endif


    <form method="POST" action="{{ route('admin.clientes.update', $cliente) }}" enctype="multipart/form-data">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">

            <div class="col-md-3">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Cliente</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="form-group {{ $errors->has('nombres') ? 'text-danger' : '' }}">
                            <label>Nombres y Apellidos</label>
                            <input name="nombres" value="{{ old('nombres', $cliente->nombres) }}" type="text"
                                class="form-control" placeholder="ingrese aquí el nombre y apellido del cliente">
                            <!-- el segundo parametro del old sirve para pintar en caso este vacio -->
                            <!-- <div class="poner la clase para sombrear solo el mensaje">-->
                            {!! $errors->first('nombres', '<span class="help-block">:message</span>') !!}
                            <!-- </div>-->
                            <!-- le ponemos !! a cambio del { y del }-->
                        </div>

                        <div class="form-group {{ $errors->has('dni') ? 'text-danger' : '' }}">
                            <label>DNI</label>
                            <input name="dni" value="{{ old('dni', $cliente->dni) }}" type="text" class="form-control"
                                placeholder="ingrese DNI del cliente">

                            {!! $errors->first('dni', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('user_id') ? 'text-danger' : '' }}">
                            <label>Tiendas</label>
                            <select name="user_id" class="form-control select2">
                                <option value="">Selecciona una tienda</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id', $cliente->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('zona_id') ? 'text-danger' : '' }}">
                            <label>Zonas</label>
                            <select name="zona_id" class="form-control select22">
                                <option value="">Selecciona una zona</option>
                                @foreach ($zonas as $zona)
                                    <option value="{{ $zona->id }}"
                                        {{ old('zona_id', $cliente->zona_id) == $zona->id ? 'selected' : '' }}>
                                        {{ $zona->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('zona_id', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('tipodocumento') ? 'text-danger' : '' }}">
                            <label>TIPO DOCUMENTO</label>

                            <select name="tipodocumento" class="form-control select23">
                                <option value="">Seleccione documento</option>

                                <option value="1"
                                    {{ old('tipodocumento', $cliente->tipodocumento) == 1 ? 'selected' : '' }}>
                                    FACTURA</option>
                                <option value="2"
                                    {{ old('tipodocumento', $cliente->tipodocumento) == 2 ? 'selected' : '' }}>
                                    BOLETA</option>

                            </select>

                            <!--  <input name="tipodocumento" value="{{ old('tipodocumento', $cliente->tipodocumento) }}"
                                                                    type="text" class="form-control"
                                                                    placeholder="ingrese aquí el tipo de documento"> -->

                            {!! $errors->first('tipodocumento', '<span class="help-block">:message</span>') !!}

                        </div>



                        <div class="form-group {{ $errors->has('numdocumento') ? 'text-danger' : '' }}">
                            <label>Número Documento</label>
                            <input name="numdocumento" value="{{ old('numdocumento', $cliente->numdocumento) }}" type="text"
                                class="form-control" placeholder="ingrese aquí el numero de comprobante">
                     
                            {!! $errors->first('numdocumento', '<span class="help-block">:message</span>') !!}
                       
                        </div>







                        <div class="form-group">
                            <label>Fecha de Venta:</label>

                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="fechadeventa" value="{{ old('fechadeventa', $cliente->fechadeventa) }}"
                                    type="text" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>


                        <div class="form-group">
                            <label>Fecha de Recepción:</label>

                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="fechaderecepcion"
                                    value="{{ old('fechaderecepcion', $cliente->fechaderecepcion) }}" type="text"
                                    class="form-control pull-right" id="datepicker2">
                            </div>
                            <!-- /.input group -->
                        </div>




                        <div class="form-group {{ $errors->has('estadocivil') ? 'text-danger' : '' }}">
                            <label>ESTADO CIVIL</label>

                            <select name="estadocivil" class="form-control select23">
                                <option value="">Seleccione estado civil</option>

                                <option value="1" {{ old('estadocivil', $cliente->estadocivil) == 1 ? 'selected' : '' }}>
                                    SOLTERO</option>
                                <option value="2" {{ old('estadocivil', $cliente->estadocivil) == 2 ? 'selected' : '' }}>
                                    CASADO</option>
                                <option value="3" {{ old('estadocivil', $cliente->estadocivil) == 3 ? 'selected' : '' }}>
                                    VIUDO</option>
                                <option value="4" {{ old('estadocivil', $cliente->estadocivil) == 4 ? 'selected' : '' }}>
                                    DIVORCIADO</option>
                            </select>


                            {!! $errors->first('estadocivil', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('pagoadministrativo') ? 'text-danger' : '' }}">
                            <label>PAGO ADMINISTRATIVO</label>

                            <select name="pagoadministrativo" class="form-control select23">
                                <option value="">Seleccione Pago Administrativo</option>

                                <option value="1"
                                    {{ old('pagoadministrativo', $cliente->pagoadministrativo) == 1 ? 'selected' : '' }}>
                                    CONFORME</option>
                                <option value="2"
                                    {{ old('pagoadministrativo', $cliente->pagoadministrativo) == 2 ? 'selected' : '' }}>
                                    NO FIGURA PAGO ADMIN</option>

                            </select>


                            {!! $errors->first('pagoadministrativo', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('marca') ? 'text-danger' : '' }}">
                            <label>Marca</label>
                            <input name="marca" value="{{ old('marca', $cliente->marca) }}" type="text"
                                class="form-control" placeholder="ingrese marca">

                            {!! $errors->first('marca', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('codigoverificacion') ? 'text-danger' : '' }}">
                            <label>Código de Verificación</label>
                            <input name="codigoverificacion"
                                value="{{ old('codigoverificacion', $cliente->codigoverificacion) }}" type="text"
                                class="form-control" placeholder="ingrese Código de Verificación">

                            {!! $errors->first('codigoverificacion', '<span class="help-block">:message</span>') !!}

                        </div>




                    </div>


                </div>

            </div>



            <div class="col-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Cliente</h3>
                    </div>
                    <div class="card-body">




                        <div class="form-group {{ $errors->has('modelo') ? 'text-danger' : '' }}">
                            <label>Modelo</label>
                            <input name="modelo" value="{{ old('modelo', $cliente->modelo) }}" type="text"
                                class="form-control" placeholder="ingrese modelo">
                            {!! $errors->first('modelo', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('chasis') ? 'text-danger' : '' }}">
                            <label>Chasis</label>
                            <input name="chasis" value="{{ old('chasis', $cliente->chasis) }}" type="text"
                                class="form-control" placeholder="ingrese chasis">
                            {!! $errors->first('chasis', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('motor') ? 'text-danger' : '' }}">
                            <label>Motor</label>
                            <input name="motor" value="{{ old('motor', $cliente->motor) }}" type="text"
                                class="form-control" placeholder="ingrese motor">
                            {!! $errors->first('motor', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('color') ? 'text-danger' : '' }}">
                            <label>Color</label>
                            <input name="color" value="{{ old('color', $cliente->color) }}" type="text"
                                class="form-control" placeholder="ingrese color">
                            {!! $errors->first('color', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('dua') ? 'text-danger' : '' }}">
                            <label>Dua</label>
                            <input name="dua" value="{{ old('dua', $cliente->dua) }}" type="text" class="form-control"
                                placeholder="ingrese dua">
                            {!! $errors->first('dua', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('item') ? 'text-danger' : '' }}">
                            <label>Item</label>
                            <input name="item" value="{{ old('item', $cliente->item) }}" type="text"
                                class="form-control" placeholder="ingrese item">
                            {!! $errors->first('item', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('tipovehiculo') ? 'text-danger' : '' }}">
                            <label>TIPO VEHICULO</label>

                            <select name="tipovehiculo" class="form-control select23">
                                <option value="">Seleccione tipo vehiculo</option>

                                <option value="lineal"
                                    {{ old('tipovehiculo', $cliente->tipovehiculo) == 'lineal' ? 'selected' : '' }}>
                                    LINEAL</option>
                                <option value="trimoto"
                                    {{ old('tipovehiculo', $cliente->tipovehiculo) == 'trimoto' ? 'selected' : '' }}>
                                    TRIMOTO</option>

                            </select>


                            {!! $errors->first('tipovehiculo', '<span class="help-block">:message</span>') !!}

                        </div>



                        <div class="form-group {{ $errors->has('tipoventa') ? 'text-danger' : '' }}">
                            <label>TIPO VENTA</label>

                            <select name="tipoventa" class="form-control select23">
                                <option value="">Seleccione tipo de venta</option>

                                <option value="1" {{ old('tipoventa', $cliente->tipoventa) == 1 ? 'selected' : '' }}>
                                    CONFORME</option>
                                <option value="2" {{ old('tipoventa', $cliente->tipoventa) == 2 ? 'selected' : '' }}>
                                    NO FIGURA PAGO ADMIN</option>

                            </select>


                            {!! $errors->first('tipoventa', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('montodelacompra') ? 'text-danger' : '' }}">
                            <label>Monto de la compra</label>
                            <input name="montodelacompra" value="{{ old('montodelacompra', $cliente->montodelacompra) }}"
                                type="text" class="form-control" placeholder="ingrese montodelacompra">
                            {!! $errors->first('montodelacompra', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group">
                            <label>Fecha de Ingreso SUNARP:</label>

                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="fechaingrespsunarp"
                                    value="{{ old('fechaingrespsunarp', $cliente->fechaingrespsunarp) }}" type="text"
                                    class="form-control pull-right" id="datepickerfis">
                            </div>
                            <!-- /.input group -->
                        </div>


                        <div class="form-group {{ $errors->has('numerodetitulo') ? 'text-danger' : '' }}">
                            <label>Numero de titulo</label>
                            <input name="numerodetitulo" value="{{ old('numerodetitulo', $cliente->numerodetitulo) }}"
                                type="text" class="form-control" placeholder="ingrese número de título del cliente">

                            {!! $errors->first('numerodetitulo', '<span class="help-block">:message</span>') !!}

                        </div>




                    </div>


                </div>
            </div>


            <div class="col-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Cliente</h3>
                    </div>
                    <div class="card-body">


                        <!-- pdf uno -->


                        <div class="image-wrapper">
                            @isset($cliente->pdf1)
                                <a href="{{ Storage::url($cliente->pdf1) }}" target="_blank"><img
                                        src="{{ asset('img/logopdf.jpg') }}"></a>
                            @else
                                <a href="#">No hay</a>
                            @endif

                        </div>

                        <div>
                            <div class="form-group">
                                    {!! Form::label('file', 'Archivo a desacargar') !!}
                                    {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}

                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                            </div>


                        </div>

                        <!-- pdf uno -->


                        <!-- pdf dos -->


                        <div class="image-wrapper">
                                @isset($cliente->pdf2)
                                    <a href="{{ Storage::url($cliente->pdf2) }}"><img
                                            src="{{ asset('img/logopdf.jpg') }}"></a>
                                @else
                                    <a href="#">No hay</a>
                                @endif

                        </div>

                        <div>
                            <div class="form-group">
                                {!! Form::label('file2', 'Archivo a desacargar') !!}

                                {!! Form::file('file2', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                                @error('file2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                        </div>

                        <!-- pdf dos -->




                        <!-- pdf tres -->


                        <div class="image-wrapper">
                            @isset($cliente->pdf3)
                                <a href="{{ Storage::url($cliente->pdf3) }}"><img src="{{ asset('img/logopdf.jpg') }}"></a>
                            @else
                                <a href="#">No hay</a>
                            @endif

                        </div>

                        <div>
                            <div class="form-group">
                                            {!! Form::label('file3', 'Archivo a desacargar') !!}

                                            {!! Form::file('file3', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                                            @error('file3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                            </div>


                        </div>

                        <!-- pdf tres -->















                                   


                                    <div class="form-group {{ $errors->has('importepagado') ? 'text-danger' : '' }}">
                                        <label>Ingrese importe pagado</label>
                                        <input name="importepagado" value="{{ old('importepagado', $cliente->importepagado) }}"
                                            type="text" class="form-control" placeholder="ingrese importe pagado">

                                        {!! $errors->first('importepagado', '<span class="help-block">:message</span>') !!}

                                    </div>


                                    <div class="form-group {{ $errors->has('oficinaregistral') ? 'text-danger' : '' }}">
                                        <label>Ingrese oficina registral</label>
                                        <input name="oficinaregistral"
                                            value="{{ old('oficinaregistral', $cliente->oficinaregistral) }}" type="text"
                                            class="form-control" placeholder="ingrese importe pagado">

                                        {!! $errors->first('oficinaregistral', '<span class="help-block">:message</span>') !!}

                                    </div>




                                    <!-- pdf status -->


                                    <div class="image-wrapper">
                                        @isset($cliente->pdfstatus)
                                            <a href="{{ Storage::url($cliente->pdfstatus) }}"><img
                                                    src="{{ asset('img/logopdf.jpg') }}"></a>
                                        @else
                                            <a href="#">No hay</a>
                                            @endif

                                    </div>

                                    <div>
                                        <div class="form-group">
                                            {!! Form::label('pdfstatus', 'PDF STATUS') !!}

                                            {!! Form::file('pdfstatus', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                                            @error('pdfstatus')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                    </div>

                                    <!-- pdf status -->


                                        <div class="form-group">
                                            <label>Fecha de Observación:</label>

                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input name="fechadeobservacion"
                                                    value="{{ old('fechadeobservacion', $cliente->fechadeobservacion) }}" type="text"
                                                    class="form-control pull-right" id="datepickerfobs">
                                            </div>
                                            <!-- /.input group -->
                                        </div>


                                        <div class="form-group">
                                            <label>Fecha de Vencimiento:</label>

                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input name="fechadevencimiento"
                                                    value="{{ old('fechadevencimiento', $cliente->fechadevencimiento) }}" type="text"
                                                    class="form-control pull-right" id="datepickerfvenci">
                                            </div>
                                            <!-- /.input group -->
                                        </div>


                                        <div class="form-group">
                                            <label>fecha ingreso levanta observacion</label>

                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input name="fechaingresolevantaobservacion"
                                                    value="{{ old('fechaingresolevantaobservacion', $cliente->fechaingresolevantaobservacion) }}"
                                                    type="text" class="form-control pull-right" id="datepickerfili">
                                            </div>
                                            <!-- /.input group -->
                                        </div>


                                      
                    </div>
                </div>

            </div>


            <div class="col-md-3">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Cliente</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                      
                        <!-- pdf observacion -->                     
                        <div class="image-wrapper">
                            @isset($cliente->pdfobservacion)
                                <a href="{{ Storage::url($cliente->pdfobservacion) }}"><img src="{{ asset('img/logopdf.jpg') }}"></a>
                            @else
                                <a href="#">No hay</a>
                            @endif
                        </div>
                                        
                        <div>
                            <div class="form-group">
                                {!! Form::label('pdfobservacion', 'PDF de Observación') !!}

                                {!! Form::file('pdfobservacion', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                                @error('pdfobservacion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                        </div>
                                    
                        <!-- pdf observacion -->




                        <!-- pdf tarjeta de propiedad -->                      
                        <div class="image-wrapper">
                            @isset($cliente->pdftarjetadepropiedad)
                                <a href="{{ Storage::url($cliente->pdftarjetadepropiedad) }}"><img src="{{ asset('img/logopdf.jpg') }}"></a>
                                    @else
                                        <a href="#">No hay</a>
                                    @endif
                        </div>
                                        
                        <div>
                            <div class="form-group">
                                {!! Form::label('pdftarjetadepropiedad', 'Tarjeta de Propiedad') !!}

                                {!! Form::file('pdftarjetadepropiedad', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                                    @error('pdftarjetadepropiedad')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <!-- pdf tarjeta de propiedad -->



                        <div class="form-group {{ $errors->has('numerodeplaca') ? 'text-danger' : '' }}">
                            <label>Numero de placa</label>
                            <input name="numerodeplaca" value="{{ old('numerodeplaca', $cliente->numerodeplaca) }}" type="text"
                                class="form-control" placeholder="ingrese número de título del cliente">

                            {!! $errors->first('numerodeplaca', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group">
                            <label>fecha de pago de placa</label>

                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="fechadepagodeplaca"
                                    value="{{ old('fechadepagodeplaca', $cliente->fechadepagodeplaca) }}"
                                    type="text" class="form-control pull-right" id="datepickerfpp">
                            </div>
                            <!-- /.input group -->
                        </div>



                        <div class="form-group">
                            <label>fecha de recojo de placa</label>

                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="fechaderecojodeplaca"
                                    value="{{ old('fechaderecojodeplaca', $cliente->fechaderecojodeplaca) }}"
                                    type="text" class="form-control pull-right" id="datepickerfrp">
                            </div>
                            <!-- /.input group -->
                        </div>                        



                        <div class="form-group">
                            <label>fecha de envio de placa</label>

                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="fechadeenviodeplaca"
                                    value="{{ old('fechadeenviodeplaca', $cliente->fechadeenviodeplaca) }}"
                                    type="text" class="form-control pull-right" id="datepickerfep">
                            </div>
                            <!-- /.input group -->
                        </div>







                        <div class="form-group {{ $errors->has('guiaderemision') ? 'text-danger' : '' }}">
                            <label>Guia de Remision</label>
                            <input name="guiaderemision" value="{{ old('guiaderemision', $cliente->guiaderemision) }}" type="text"
                                class="form-control" placeholder="ingrese guia de remisión">

                            {!! $errors->first('guiaderemision', '<span class="help-block">:message</span>') !!}

                        </div>



                        
                        <div class="form-group {{ $errors->has('statusfinal') ? 'text-danger' : '' }}">
                            <label>Status final</label>
                            <input name="statusfinal" value="{{ old('statusfinal', $cliente->statusfinal) }}" type="text"
                                class="form-control" placeholder="Status final">

                            {!! $errors->first('statusfinal', '<span class="help-block">:message</span>') !!}

                        </div>




                        <div class="form-group {{ $errors->has('recibo') ? 'text-danger' : '' }}">
                            <label>Ingrese Recibo</label>
                            <input name="recibo" value="{{ old('recibo', $cliente->recibo) }}" type="text"
                                class="form-control" placeholder="ingrese Recibo">

                            {!! $errors->first('recibo', '<span class="help-block">:message</span>') !!}

                        </div>







                    </div>


                </div>

            </div>
            

            

        </div>                
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('observacion') ? 'text-danger' : '' }}">
                    <label>Contenido de la observación</label>
                    <textarea rows="15" name="observacion" id="observacion" class="form-control"
                                        placeholder="Ingrese observación">{{ old('observacion', $cliente->observacion) }}</textarea>
                    {!! $errors->first('observacion', '<span class="help-block">:message</span>') !!}


                </div>
            </div>
        </div>



        <div class="form-group">
            <button type='submit' class="btn btn-primary btn-block">Guardar Cliente</button>
        </div>


    </form>


                @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
                <link rel="stylesheet" href="/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.1/dropzone.css">
                <!--   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"> -->

                <link rel="stylesheet" href="/vendor/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
                <link rel="stylesheet" href="/vendor/adminlte/plugins/select2/css/select2.min.css">
            @stop

        @section('js')
            <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.1/min/dropzone.min.js"></script>



            <script src="/vendor/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
            <script src="/vendor/adminlte/plugins/select2/js/select2.full.min.js"></script>


            <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>




            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>  -->


            <script>
                ClassicEditor
                    .create(document.querySelector('#observacion'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>



            <script>
                $('#datepicker').datepicker({
                    autoclose: true
                });

                $('#datepicker2').datepicker({
                    autoclose: true
                });

                $('#datepickerfis').datepicker({
                    autoclose: true
                });

                $('#datepickerfobs').datepicker({
                    autoclose: true
                });

                $('#datepickerfvenci').datepicker({
                    autoclose: true
                });

                $('#datepickerfili').datepicker({
                    autoclose: true
                });

                $('#datepickerfpp').datepicker({
                    autoclose: true
                });

                $('#datepickerfrp').datepicker({
                    autoclose: true
                });


                $('#datepickerfep').datepicker({
                    autoclose: true
                });



                $('.select2').select2({
                    tags: true
                });

                $('.select22').select2({
                    tags: true
                });

                $('.select23').select2({
                    tags: true
                });
            </script>















        @stop
