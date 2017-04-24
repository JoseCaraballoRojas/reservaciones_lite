<div class="row">
  <div class="col s12 m12 l12">
    <div class="card-panel">
        <h4 class="header2">Responsable </h4>
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="finput-field col s12">
                {!! Form::label('user_id', 'Catalogo de usuarios') !!}
                {!! Form::select('responsable_id', $users, $edit ? $agenda->responsable_id : '',
                  ['placeholder' => 'selecione un responsable...', 'required'  ]) !!}
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
