<nav class="navbar absolute transparent @isset($light) inverse-text @endisset navbar-hover-opacity navbar-expand-lg">
    <div class="container">
        <div class="navbar-brand"><a href="/">
                <img src="#"
                     srcset="{{ asset('style/images/logo.png') }} 1x, {{ asset('style/images/logo@2x.png') }} 2x"
                     class="@isset($light) logo-dark @else logo-light @endisset" alt=""/>
                <img src="#"
                     srcset="{{ asset('style/images/logo-light.png') }} 1x, {{ asset('style/images/logo-light@2x.png') }} 2x"
                     class="logo-light"
                     alt=""/></a></div>
        <div class="navbar-other ml-auto order-lg-3">
            <ul class="navbar-nav flex-row align-items-center" data-sm-skip="true">
                <li class="nav-item">
                    <div class="navbar-hamburger d-lg-none d-xl-none ml-auto">
                        <button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button>
                    </div>
                </li>
                <li class="dropdown search-dropdown position-static nav-item">
                    <a href="#" role="button" class="collapse-toggle" data-toggle="collapse"
                       data-target=".search-dropdown-menu" aria-haspopup="true" aria-expanded="false"><i
                            class="jam jam-search"></i></a>
                    <div class="dropdown-menu search-dropdown-menu w-100 collapse">
                        <div class="form-wrapper">
                            <form class="inverse-text">
                                <input type="text" class="form-control" placeholder="Search something">
                            </form>
                            <!-- /.search-form -->
                            <i class="dropdown-close jam jam-close"></i>
                        </div>
                        <!-- /.form-wrapper -->
                    </div>
                </li>
                <li class="nav-item">
                    <button class="plain" data-toggle="offcanvas-info"><i class="jam jam-info"></i></button>
                </li>
            </ul>
            <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-other -->
        <div class="navbar-collapse offcanvas-nav">
            <div class="offcanvas-header d-lg-none d-xl-none">
                <a href="index.html"><img src="#"
                                          srcset="{{ asset('style/images/logo-light.png')}} 1x, {{ asset('style/images/logo-light@2x.png') }} 2x"
                                          alt=""/></a>
                <button class="plain offcanvas-close offcanvas-nav-close"><i class="jam jam-close"></i></button>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!">{{__('menu.blog')}}</a>
                    <ul class="dropdown-menu">
                        @auth
                        <li><a class="dropdown-item" href="{{ route('posts.create') }}">{{__('menu.create-post')}}</a></li>
                        @endauth
                        <li><a class="dropdown-item" href="{{ route('authors.index') }}">{{__('menu.authors')}}</a></li>

                    </ul>
                </li>
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!"
                       onclick="document.querySelector('#logout').submit()">{{__('menu.logout')}}</a>
                </li>
                @if(auth()->user()->isAdmin())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('admin.index')}}"
                       >{{__('menu.admin-panel')}}</a>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="cursor: pointer">{{ auth()->user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('users.authors') }}">Subscriptions</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.readers') }}">Readers</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.feed') }}">Feed</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.posts') }}">My Posts</a></li>
                    </ul>
                </li>
                @endauth
                <li>
                    <select name="lang" form="changeLocale" style="margin-top: 22px" onchange="sendForm('changeLocale')">
                        <option @selected(session('lang')=='en') value="en">Eng</option>
                        <option @selected(session('lang')=='uk' ) value="uk">Укр</option>
                    </select>
                </li>


            </ul>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="post" id="logout">
        @csrf
    </form>
    <form action="{{ route('change-locale') }}" method="post" id="changeLocale">
        @csrf
    </form>
</nav>

