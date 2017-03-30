<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Detalles de la Empresa  </div>
            <div class="panel-body">

              <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('nombre', 'Razon social nombre') !!}
                      {!! Form::text('nombre',null, ['class' => 'form-control',
                      'placeholder' => 'Razon social nombre', 'required']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('direccion', 'Dirección') !!}
                      {!! Form::text('direccion',null, ['class' => 'form-control',
                      'placeholder' => 'Dirección']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('ciudad', 'Ciudad') !!}
                      {!! Form::text('ciudad',null, ['class' => 'form-control',
                      'placeholder' => 'Ciudad']) !!}
                  </div>

              </div>
              <div class="col-md-6">

                  <div class="form-group">
                      {!! Form::label('estado', 'Estado') !!}
                      {!! Form::text('estado',null, ['class' => 'form-control',
                      'placeholder' => 'Estado']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('telefono', 'Telefono fijo') !!}
                      {!! Form::text('telefono',null, ['class' => 'form-control',
                      'placeholder' => 'Telefono fijo']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('logo', 'Logo de la empresa') !!}
                      {!! Form::text('logo',null, ['class' => 'form-control',
                      'placeholder' => 'Logo de la empresa']) !!}
                  </div>
              </div>
          </div>
        </div>
  </div>

</div>
