<aside id="left-sidebar-nav">
  <ul id="slide-out" class="side-nav fixed leftside-navigation">
      <li class="user-details cyan darken-2">
      <div class="row">
          <div class="col col s4 m4 l4">
              <img src="{{ url('assets/template/images/avatar.jpg') }}" alt="" class="circle responsive-img valign profile-image">
          </div>
          <div class="col col s8 m8 l8">
              <ul id="profile-dropdown" class="dropdown-content">
                  <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                  </li>
                  <li><a href="#"><i class="mdi-action-settings"></i> Config</a>
                  </li>
                  <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                  </li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                  </li>
                  <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                  </li>
              </ul>
              <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn"
                  href="#" data-activates="profile-dropdown">Usuario
                  <i class="mdi-navigation-arrow-drop-down right"></i></a>
              <p class="user-roal">Administrator</p>
          </div>
      </div>
      </li>
      <li class="bold {{ Request::is('/') ? 'active open' : ''  }}" >
        <a href="{{ route('dashboard') }}"
          class="waves-effect waves-cyan {{ Request::is('/') ? 'active' : ''  }}">
          <i class="mdi-action-dashboard"></i> @lang('app.dashboard')
        </a>
      </li>

      <li class="bold">
        <a href="{{ route('empresas.index') }}" class="waves-effect waves-cyan">
          <i class="mdi-communication-business"></i>  @lang('app.company')s
        </a>
      </li>

      <li class="bold">
        <a href="{{ route('sucursales.index') }}" class="waves-effect waves-cyan">
          <i class="mdi-social-location-city"></i>  @lang('app.subsidiaries')
        </a>
      </li>
      <li class="bold">
        <a href="{{ route('areas.index') }}" class="waves-effect waves-cyan">
          <i class="mdi-action-store"></i>  Areas & Departamentos
        </a>
      </li>
      @permission('users.manage')
      <li class="bold {{ Request::is('user*') ? 'active open' : ''  }}">
        <a href="{{ route('user.list') }}"
          class="waves-effect waves-cyan {{ Request::is('user*') ? 'active' : ''  }}">
          <i class="mdi-social-people"></i> @lang('app.users')
        </a>
      </li>
      @endpermission

      @permission('users.activity')
      <li class="bold {{ Request::is('activity*') ? 'active open' : ''  }}">
        <a href="{{ route('activity.index') }}"
          class="waves-effect waves-cyan {{ Request::is('activity*') ? 'active' : ''  }}">
          <i class="mdi-notification-event-note"></i> @lang('app.activity_log')
        </a>
      </li>
      @endpermission
      @permission(['roles.manage', 'permissions.manage'])
      <li class="no-padding {{ Request::is('role*') || Request::is('permission*') ? 'active open' : ''  }}">
          <ul class="collapsible collapsible-accordion">
              <li class="bold">
                <a class="collapsible-header waves-effect waves-cyan">
                  <i class="mdi-action-account-box"></i> @lang('app.roles_and_permissions')
                </a>
                  <div class="collapsible-body">
                      <ul>
                        @permission('roles.manage')
                        <li>
                          <a href="{{ route('role.index') }}"
                            class="{{ Request::is('role*') ? 'active' : ''  }}">
                            @lang('app.roles')
                          </a>
                        </li>
                        @endpermission
                        @permission('permissions.manage')
                        <li>
                          <a href="{{ route('permission.index') }}"
                            class="{{ Request::is('permission*') ? 'active' : ''  }}">
                            @lang('app.permissions')
                          </a>
                        </li>
                        @endpermission
                      </ul>
                  </div>
              </li>
          </ul>
      </li>
      @endpermission
      @permission(['settings.general', 'settings.auth', 'settings.notifications'])
      <li class="no-padding {{ Request::is('settings*') ? 'active open' : ''  }}">
          <ul class="collapsible collapsible-accordion">
              <li class="bold">
                <a class="collapsible-header waves-effect waves-cyan">
                  <i class="mdi-action-settings"></i>@lang('app.settings')
                </a>
                  <div class="collapsible-body">
                      <ul>
                        @permission('settings.general')
                        <li>
                          <a href="{{ route('settings.general') }}"
                            class="{{ Request::is('settings') ? 'active' : ''  }}">
                            @lang('app.general')
                          </a>
                        </li>
                        @endpermission
                        @permission('settings.auth')
                        <li>
                          <a href="{{ route('settings.auth') }}"
                            class="{{ Request::is('settings/auth*') ? 'active' : ''  }}">
                            @lang('app.auth_and_registration')
                          </a>
                        </li>
                        @endpermission
                        @permission('settings.notifications')
                            <li>
                                <a href="{{ route('settings.notifications') }}"
                                   class="{{ Request::is('settings/notifications*') ? 'active' : ''  }}">
                                    @lang('app.notifications')
                                </a>
                            </li>
                        @endpermission
                      </ul>
                  </div>
              </li>
          </ul>
      </li>
      @endpermission
      <li class="li-hover"><div class="divider"></div></li>
      <li class="li-hover"><p class="ultra-small margin more-text">MAS</p></li>
      <li><a href="#"><i class="mdi-action-verified-user"></i> Angular UI  <span class="new badge"></span></a>
      </li>
      <li class="li-hover"><div class="divider"></div></li>
      <li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>
      <li class="li-hover">
          <div class="row">
              <div class="col s12 m12 l12">
                  <div class="sample-chart-wrapper">
                      <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                  </div>
              </div>
          </div>
      </li>
  </ul>
  <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
  </aside>
