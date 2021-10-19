<header class="site-header" id="header">
    <nav class="navbar navbar-expand-lg transparent-bg static-nav">
        <div class="container">
            <a class="navbar-brand d-block d-sm-none" href="index.html">
                <img src="{{asset('').'site/assets/img/oal_logo.png'}}" alt="logo" class="logo-default" style="width: 55px">
                <span class="logo-default whitecolor">OLYMPUS ASSET LIMITED</span>
                <img src="{{asset('').'site/assets/img/oal_logo.png'}}" alt="logo" class="logo-scrolled" style="width: 54px">
                <span class="logo-scrolled">OLYMPUS ASSET LIMITED</span>
            </a>
            <div class="collapse navbar-collapse">
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('').'site/assets/img/oal_logo.png'}}" alt="logo" class="logo-default" style="width: 60px">
                    <span class="logo-default whitecolor">OLYMPUS ASSET LIMITED</span>                    
                    <img src="{{asset('').'site/assets/img/oal_logo.png'}}" alt="logo" class="logo-scrolled" style="width: 54px">
                    <span class="logo-scrolled mt-1">OLYMPUS ASSET LIMITED</span>
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown static">
                        <a class="nav-link active" href="{{ url("index.html") }}">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("who-we-are.html") }}">Who We Are</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("corporate-values.html") }}">Corporate Values</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("methdology.html") }}">Methodology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("newsletter.html") }}">Newsletter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("index.html#stayconnect") }}">Contact Us</a>
                    </li>
                    {{-- @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown site-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-user-circle"></i>
                            </a>
                            <div class="dropdown-menu site-dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if(Auth::user()->role_id == 2){ ?>
                                    <a class="dropdown-item" href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                                <?php }else{ ?>
                                    <a class="dropdown-item" href="{{ url('/investor/dashboard') }}">{{ __('Dashboard') }}</a>
                                <?php } ?>
                                
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" title="Logout">{{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest --}}
                    
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <?php if(Auth::user()->role_id == 2){ ?>
                            <a class="nav-link" href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                        <?php }else{ ?>
                            <a class="nav-link" href="{{ url('/investor/dashboard') }}">{{ __('Dashboard') }}</a>
                        <?php } ?>
                    </li>
                        
                    <li class="nav-item">                    
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" title="Logout"><i class="fas fa-power-off"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
        <!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn d-block d-sm-none" id="sidemenu_toggle">
            <span></span> <span></span> <span></span>
        </a>
    </nav>
    <!-- side menu -->
    <div class="side-menu opacity-0 gradient-bg">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url("index.html") }}">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("who-we-are.html") }}">Who We Are</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("corporate-values.html") }}">Corporate Values</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("methdology.html") }}">Methodology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("newsletter.html") }}">Newsletter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("index.html#stayconnect") }}">Contact Us</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <?php if(Auth::user()->role_id == 2){ ?>
                            <a class="nav-link" href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                        <?php }else{ ?>
                            <a class="nav-link" href="{{ url('/investor/dashboard') }}">{{ __('Dashboard') }}</a>
                        <?php } ?>
                    </li>
                        
                    <li class="nav-item">                    
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" title="Logout">Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple white top40">
                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                </ul>
                <p class="whitecolor">&copy; <span id="year"></span>2021 Olympus Asset Limited (Company no: 165016)</p>
            </div>
        </div>
    </div>
    <div id="close_side_menu" class="tooltip"></div>
    <!-- End side menu -->
</header>