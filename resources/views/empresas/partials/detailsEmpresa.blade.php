<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Detalles de la Empresa  </h4>
               <div class="row">

                 <div class="col s6">
                   <div class="row">
                     <div class="finput-field col s12">
                        {!! Form::label('nombre', 'Razon social nombre') !!}
                        {!! Form::text('nombre', $edit ? $empresa->nombre : '') !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('direccion', 'Dirección') !!}
                        {!! Form::text('direccion', $edit ? $empresa->direccion : '') !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('ciudad', 'Ciudad') !!}
                        {!! Form::text('ciudad', $edit ? $empresa->ciudad : '') !!}
                      </div>
                    </div>
                  </div>
                  <div class="col s6">
                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('estado', 'Estado') !!}
                        {!! Form::text('estado', $edit ? $empresa->estado : '') !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('telefono', 'Telefono fijo') !!}
                        {!! Form::text('telefono', $edit ? $empresa->telefono : '') !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('logo', 'Logo de la empresa') !!}
                        {!! Form::text('logo',null) !!}
                      </div>
                    </div>

                  </div>
              </div>
            </div>
          </div>
        </div>
