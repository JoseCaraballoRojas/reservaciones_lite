<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Detalles del Area  </div>
            <div class="panel-body">
              <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('sucursal_id', 'Sucursal') !!}
                    {!! Form::select('sucursal_id', $sucursales, $edit ? $area->sucursal_id : '', ['class' => 'form-control',
                    'placeholder' => 'selecione una Sucursal...', 'required'  ]) !!}
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      {!! Form::label('area', 'Nombre del area o departamento') !!}
                      {!! Form::text('area', $edit ? $area->area : '', ['class' => 'form-control',
                      'placeholder' => 'Nombre del area o departamento', 'required']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('direccion', 'Dirección') !!}
                      {!! Form::text('direccion', $edit ? $area->direccion : '', ['class' => 'form-control',
                      'placeholder' => 'Dirección']) !!}
                  </div>
              </div>
          </div>
        </div>
  </div>

</div>
