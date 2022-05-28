

    <div class="row">

        <div class="col-md-4">

            <div class="form-group">
                {!! Form::label('dni', 'DNI:') !!}
                {!! Form::text('dni', null, ['class'=>'form-control', 'placeholder'=>'Ingrese DNI del Cliente']) !!}

                @error('dni')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('nombres', 'Nombres:') !!}
                {!! Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Ingrese nombre del Cliente']) !!}

                @error('nombres')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>


            <div class="form-group">
                {!! Form::label('user_id', 'Tienda:') !!}
                {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                @error('user_id')
                  <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('zona_id', 'Zona:') !!}
                {!! Form::select('zona_id', $zonas, null, ['class' => 'form-control']) !!}
                @error('zona_id')
                  <small class="text-danger">{{$message}}</small>
                @enderror
            </div>


            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label for="">
                   Factura {!! Form::radio('tipodocumento', 1, true) !!}
                </label>
                <label for="">
                    Boleta{!! Form::radio('tipodocumento', 2) !!}
                </label>
            
                @error('tipodocumento')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>


        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
    </div>    
