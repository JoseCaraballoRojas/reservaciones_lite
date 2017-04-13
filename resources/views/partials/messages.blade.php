
@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-danger alert-notification">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
          <div id="card-alert" class="card green">
            <div class="card-content white-text">
              <p><i class="mdi-navigation-check"></i> {{ $msg }}</p>
            </div>
            <button type="button" class="close white-text"
                    data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

          {{--  <div class="alert alert-success alert-notification">
                <i class="fa fa-check"></i>
                {{ $msg }}
                <button type="button" class="close" aria-hidden="true">&times;</button>
            </div>--}}
        @endforeach
    @else
        <div class="alert alert-success alert-notification">
            <i class="fa fa-check"></i>
            {{ $data }}
            <button type="button" class="close" aria-hidden="true">&times;</button>
        </div>
    @endif
@endif
