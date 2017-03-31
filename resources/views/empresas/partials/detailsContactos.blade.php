<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Contacto 1  </div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('user_id', 'Usuario') !!}
                {!! Form::select('contacto1_id', $users, $edit ? $empresa->contacto1_id : '', ['class' => 'form-control',
                'placeholder' => 'selecione un contacto...', 'required'  ]) !!}
            </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Contacto 2  </div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('user_id', 'Usuario') !!}
                {!! Form::select('contacto2_id', $users, $edit ? $empresa->contacto2_id : '', ['class' => 'form-control',
                'placeholder' => 'selecione un contacto...']) !!}
            </div>
      </div>
    </div>
  </div>

</div>
