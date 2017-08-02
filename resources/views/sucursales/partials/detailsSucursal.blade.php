<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Detalles de la Sucursal  </h4>
               <div class="row">
                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('empresa_id', 'Empresas registradas') !!}
                       {!! Form::select('empresa_id', $empresas, $edit ? $sucursal->empresa_id : '',
                         ['placeholder' => 'Selecione una empresa...', 'required'  ]) !!}
                      </div>
                    </div>
                  </div>

                 <div class="col s6">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('sucursal', 'Nombre') !!}
                       {!! Form::text('sucursal', $edit ? $sucursal->sucursal : '',
                        ['placeholder' => 'Nombre', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('direccion', 'Dirección') !!}
                        {!! Form::text('direccion', $edit ? $sucursal->direccion : '',
                        ['placeholder' => 'Dirección']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('ciudad', 'Ciudad') !!}
                        {!! Form::text('ciudad', $edit ? $sucursal->ciudad : '',
                        ['placeholder' => 'Ciudad']) !!}
                      </div>
                    </div>
                  </div>
                  <div class="col s6">
                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('estado', 'Estado') !!}
                        {!! Form::text('estado', $edit ? $sucursal->estado : '',
                          ['placeholder' => 'Estado']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('telefono', 'Telefono fijo') !!}
                        {!! Form::text('telefono', $edit ? $sucursal->telefono : '',
                          ['placeholder' => 'Telefono fijo']) !!}
                      </div>
                    </div>

                    <div class="row">
                      {{--
                      <div class="finput-field col s12">
                        {!! Form::label('logo', 'Logo de la sucursal') !!}
                        {!! Form::text('logo',null, ['class' => 'form-control',
                        'placeholder' => 'Logo de la sucursal']) !!}
                      </div>
                      --}}
                      <div class="file-field input-field col s12">
                        <div class="btn cyan ">
                          <i class="mdi-image-camera-alt"></i>
                          <span>Logo</span>
                          <input type="file" name="logo">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
