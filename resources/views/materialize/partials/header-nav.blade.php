<div class="navbar-fixed">
    <nav class="navbar-color">
        <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="{{ route('dashboard') }}" class="brand-logo darken-1">
                    <img src="{{ url('assets/template/images/materialize-logo.png') }}" alt="materialize logo">
                  </a>
                  <span class="logo-text">Materialize</span>
                </h1>
              </li>
            </ul>
            <ul class="right hide-on-med-and-down">
                {{--<li>
                  <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown">
                    <img src="{{ url('assets/template/images/flag-icons/United-States.png') }}" alt="USA" />
                  </a>
                </li>--}}
                <li>
                  <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                    <i class="mdi-action-settings-overscan"></i>
                  </a>
                </li>
            </ul>
            <!-- translation-button -->
            {{--<ul id="translation-dropdown" class="dropdown-content">
              <li>
                <a href="#!"><img src="{{ url('assets/template/images/flag-icons/United-States.png') }} " alt="English" />  <span class="language-select">English</span></a>
              </li>
              <li>
                <a href="#!"><img src="{{ url('assets/template/images/flag-icons/France.png') }}" alt="French" />  <span class="language-select">French</span></a>
              </li>
              <li>
                <a href="#!"><img src="{{ url('assets/template/images/flag-icons/China.png') }}" alt="Chinese" />  <span class="language-select">Chinese</span></a>
              </li>
              <li>
                <a href="#!"><img src="{{ url('assets/template/images/flag-icons/Germany.png') }}" alt="German" />  <span class="language-select">German</span></a>
              </li>

            </ul>--}}
            <!-- notifications-dropdown -->

        </div>
    </nav>
</div>
