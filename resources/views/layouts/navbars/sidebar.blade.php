<div class="sidebar" data-color="orange">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            {{ __('SI') }}
        </a>
        <a href="#" class="simple-text logo-normal">
            {{ __('Kel-Tani Sejahtera') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage == 'home') active @endif">
                <a class="nav-link {{ Request::is('home')}}" href="{{ url('home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'anggota') active @endif">
                <a class="nav-link {{ Request::is('anggota')}}" href="{{ url('anggota') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>{{ __('Anggota') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'sawah') active @endif">
                <a class="nav-link {{ Request::is('sawah')}}" href="{{ url('sawah') }}">
                    <i class="now-ui-icons location_world"></i>
                    <p>{{ __('Sawah') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'iuran_bulanan') active @endif">
                <a class="nav-link {{ Request::is('iuran_bulanan')}}" href="{{ url('iuran_bulanan') }}">
                    <i class="now-ui-icons business_money-coins"></i>
                    <p>{{ __('Iuran Bulanan') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'jabatan') active @endif">
                <a class="nav-link {{ Request::is('jabatan')}}" href="{{ url('jabatan') }}">
                    <i class="now-ui-icons business_badge"></i>
                    <p>{{ __('Jabatan') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'jadwal_garap') active @endif">
                <a class="nav-link {{ Request::is('jadwal_garap')}}" href="{{ url('jadwal_garap') }}">
                    <i class="now-ui-icons education_paper"></i>
                    <p>{{ __('Jadwal Garap') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'traktor') active @endif">
                <a class="nav-link {{ Request::is('traktor')}}" href="{{ url('traktor') }}">
                    <i class="now-ui-icons ui-2_settings-90"></i>
                    <p>{{ __('Traktor') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'potong_rumput') active @endif">
                <a class="nav-link {{ Request::is('potong_rumput')}}" href="{{ url('potong_rumput') }}">
                    <i class="now-ui-icons business_briefcase-24"></i>
                    <p>{{ __('Potong Rumput') }}</p>
                </a>
            </li>
            {{-- <li>
                <a data-toggle="collapse" href="#laravelExamples">
                    <i class="fab fa-laravel"></i>
                    <p>
                        {{ __('User') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="@if ($activePage == 'profile') active @endif">
                            <a href="{{ route('profile.edit') }}">
                                <i class="now-ui-icons users_single-02"></i>
                                <p> {{ __('User Profile') }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'users') active @endif">
                            <a href="#">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                <p> {{ __('User Management') }} </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            {{-- <li class="@if ($activePage == 'icons') active @endif">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li> --}}
            {{-- <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li> --}}
            {{-- <li class=" @if ($activePage == 'notifications') active @endif">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class=" @if ($activePage == 'table') active @endif">
                <a href="{{ route('page.index', 'table') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'typography') active @endif">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="now-ui-icons text_caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li> --}}
            {{-- <li class = "">
        <a href="{{ route('page.index','upgrade') }}" class="bg-info">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> --}}
        </ul>
    </div>
</div>
