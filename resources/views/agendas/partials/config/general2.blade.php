<div class="card-panel">
    <h4 class="header2">@lang('app.working_days_week')</h4>
    <div class="card-content">
      {!! Form::open(['route' => ['agendas.configUpdate', $agenda], 'method' => 'PUT' ]) !!}
        <input type="hidden" name="id" value="{{ $agenda->id }}">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="col s12 m4 l4">
              <label for="monday">
                  <h6>@lang('app.monday')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.monday_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="monday" value="0">
                  <input type="checkbox" name="monday" value="1"
                         {{ $agenda->monday == '1' ? 'checked' : '' }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>

            <div class="col s12 m4 l4">
              <label for="tuesday">
                  <h6>@lang('app.tuesday')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.tuesday_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="tuesday" value="0">
                  <input type="checkbox" name="tuesday" value="1"
                         {{ $agenda->tuesday == '1' ? 'checked' : ''  }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>

            <div class="col s12 m4 l4">
              <label for="wednesday">
                  <h6>@lang('app.wednesday')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.wednesday_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="wednesday" value="0">
                  <input type="checkbox" name="wednesday" value="1"
                         {{ $agenda->wednesday == '1' ? 'checked' : ''  }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>
          </div>
        </div>
        <br><br>
        <div class="divider"></div>
        <br>
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="col s12 m6 l4">
              <label for="thursday">
                  <h6>@lang('app.thursday')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.thursday_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="thursday" value="0">
                  <input type="checkbox" name="thursday" value="1"
                         {{ $agenda->thursday == '1' ? 'checked' : ''  }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>

            <div class="col s12 m6 l4">
              <label for="friday">
                  <h6>@lang('app.friday')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.friday_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="friday" value="0">
                  <input type="checkbox" name="friday" value="1"
                         {{ $agenda->friday == '1' ? 'checked' : ''  }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>
            <div class="col s12 m4 l4">
              <label for="saturday">
                  <h6>@lang('app.saturday')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.saturday_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="saturday" value="0">
                  <input type="checkbox" name="saturday" value="1"
                         {{ $agenda->saturday == '1' ? 'checked' : ''  }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>
          </div>
        </div>
        <br><br>
        <div class="divider"></div>
        <br>
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="col s12 m12 l12">
              <label for="sunday">
                  <h6>@lang('app.sunday')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.sunday_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="sunday" value="0">
                  <input type="checkbox" name="sunday" value="1"
                         {{ $agenda->sunday == '1' ? 'checked' : ''  }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>
          </div>
        </div>
        <br>
<div class="divider"></div>
<br>
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="col s12 m12 l12">
              <label for="initial_holiday_date">
                  <h6>@lang('app.initial_holiday_date')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.initial_holiday_date_description')"></span></h6>
              </label>
              <input type="text" class="col s12 m12 l12 datepicker"
                     name="initial_holiday_date"
                     value="{{ $agenda ? $agenda->initial_holiday_date : ''}}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m12 l12">
            <div class="col s12 m12 l12">
              <label for="holiday_end_date">
                  <h6>@lang('app.holiday_end_date')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.holiday_end_date_description')"></span></h6>
              </label>
              <input type="text" class="col s12 m12 l12 datepicker"
                     name="holiday_end_date"
                     value="{{ $agenda ? $agenda->holiday_end_date : '' }}">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12 m12 l12">
            <button type="submit" class="btn cyan waves-effect waves-light">
                <i class="fa fa-refresh"></i>
                @lang('app.update_settings_agenda')
            </button>
          </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
