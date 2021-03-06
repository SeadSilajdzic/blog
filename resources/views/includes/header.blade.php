<header class="header" id="site-header">
    <div class="container">
        <div class="header-content-wrapper">
            <div class="logo">
                <div class="logo-text">
                    <div class="logo-title">
                        <a href="{{ url('/') }}">{{ $settings->site_name }}</a>
                    </div>
                </div>
            </div>

            <nav id="primary-menu" class="primary-menu">
                <a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
                            <span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
                                <svg width="1000px" height="1000px">
                                    <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                                    <path id="pathE" d="M 300 500 L 700 500"></path>
                                    <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
                                </svg>
                            </span>
                </a>
                <ul class="primary-menu-menu" style="overflow: hidden;">
                    @foreach($categories as $category)
                        <li >
                            <a href="{{ route('category.single', ['id' => $category->id ]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endguest

                    @auth
                        @if(Auth::user()->admin)
                            <li class="nav-item"><a href="{{ url('admin/dashboard') }}" class="nav-link">Dashboard</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile.index') }}">Profile</a></li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                        <li>{{ Auth::user()->name }}</li>

                        @endauth
                </ul>
            </nav>
            <ul class="nav-add">
                <li class="search search_main" style="color: black; margin-top: 5px;">
                    <a href="#" class="js-open-search">
                        <i class="seoicon-loupe"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="header-spacer"></div>
