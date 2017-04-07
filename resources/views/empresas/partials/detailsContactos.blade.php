<div class="row">
  <div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2">Contacto 1  </h4>
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="finput-field col s12">
                {!! Form::label('user_id', 'Catalogo de usuarios') !!}
                {!! Form::select('contacto1_id', $users, $edit ? $empresa->contacto1_id : '',
                  ['placeholder' => 'selecione un responsable...', 'required']) !!}
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2">Contacto 2  </h4>
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="finput-field col s12">
                {!! Form::label('user_id', 'Catalogo de usuarios') !!}
                {!! Form::select('contacto2_id', $users, $edit ? $empresa->contacto2_id : '',
                  ['placeholder' => 'selecione un responsable...', 'required']) !!}
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
