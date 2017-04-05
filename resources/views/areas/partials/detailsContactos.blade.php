<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Responsable  </div>
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('responsable_id', 'Usuario') !!}
                {!! Form::select('responsable_id', $users, $edit ? $area->responsable_id : '', ['class' => 'form-control',
                'placeholder' => 'selecione un responsable...', 'required'  ]) !!}
            </div>
      </div>
    </div>
  </div>
</div>
