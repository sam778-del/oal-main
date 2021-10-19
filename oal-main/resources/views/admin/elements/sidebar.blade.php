<div class="email-overlay">
    <div class="email">
        <div class="email-list-header">
            <h4>Email <small class="text-muted">12 New</small></h4>
            <a href="#" class="btn btn-soft-base overlay-close"><i data-feather="x"></i></a>
        </div>
        <div class="email-list-wrapper">
            <div class="email-list-scroll-container">
                <ul class="email-list email-list-scroll">
                    <li class="email-list-item">
                        <span class="pro-pic">
                        <img src="{{ asset('admin/images/avatars/user-1.jpg') }}" alt="Profile Picture">
                        <a href="#" class="attachment">
                        <i data-feather="paperclip"></i>
                        </a>
                        </span>
                        <div class="email-content">
                            <div class="recipient">
                                <p class="recipient-name">Ronald Morris</p>
                                <p class="recipient-time">11:50 AM</p>
                            </div>
                            <a href="#" class="email-subject">Prepare Mockups as per scope!<i class="starred">&nbsp;</i></a>
                            <div class="email-text">
                                Hello Ronald, Please prepare mockups according to the spec documentation...
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="notification-overlay">
    <div class="notify-header">
        <h4>Notifications
        <?php 
            $noti_count = 0;
            if(!empty($notificationGobal)){ 
                foreach ($notificationGobal as $notification){
                    $noti_count +=1; 
                }
            }

            if($noti_count != 0){
                echo '<small class="text-danger">';
                echo $noti_count;
                echo ' New</small>';
            }
        ?></h4>
        <a href="#" class="btn btn-soft-base overlay-close"><i data-feather="x"></i></a>
    </div>
    <div class="notify-body">
        <ul class="notify-list">
            <?php if(!empty($notificationGobal)){ 
                foreach ($notificationGobal as $notification){?>
                <li class="notify-item ">
                    <div class="notify-thumbnail">
                        <div class="notify-icon bg-soft-base rounded-circle">
                            <i data-feather="tablet" class="text-base"></i>
                        </div>
                    </div>
                    <div class="notify-item-content">
                        <a href=" {{ url($notification->link) }}" class="email-subject"> {{ $notification->message 
                        }}</a>
                        <small> {{ $notification->created_at }}</small>
                    </div>
                </li>
            <?php }} ?>

        </ul>
    </div>
</div>
<div class="sidebar-overlay"></div>
<!-- partial -->
<!-- partial:../../partials/_navbar.html -->
<nav class="navbar fixed-top">
    <div class="navbar-menu-container d-flex align-items-center justify-content-center">
        <div class="text-center navbar-brand-container align-items-center justify-content-center">
            <a class="brand-logo" href="{{ url('/dashboard') }}"><img src="{{ asset('logo.png') }}"
                alt="OAL Dashboard" title="OAL Dashboard"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
                <a class="nav-link count-highlighter" id="notificationToolbar" href="#">
                <i class="fas fa-bell"></i>
                    <span class="badge badge-sb-danger notification-count-inside">
                        <?php echo $noti_count; ?>
                    </span>
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link count-highlighter" id="emailToolbar" href="#">
                <i class="fas fa-envelope"></i>
                <span class="count"></span>
                </a>
            </li>
            <li class="nav-item nav-profile">
                <a class="nav-link" href="#">
                    <img src="{{ asset('/images/icons/icon-144x144.png') }}" alt="Profile Pic" />
                </a>
            </li>-->
            
            <li class="nav-item nav-profile">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
              <li class="nav-item mobile-sidebar">
                <button class="nav-link navbar-toggler navbar-toggler-right align-self-center" type="button"
                        data-toggle="lgy-sidebar">
                    <i class="fas fa-align-right"></i>
                </button>
            </li>

        </ul>
    </div>
</nav>

<nav class="navbar-container flex-row" id="navbar">
    <div class="primary">
        <div class="sub-header">
            <a class="brand-logo" href="{{ url('/dashboard') }}">
            <img src="{{ asset('logo.png') }}" alt="OAL Dashboard" title="OAL Dashboard"/>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="lgy-sb">
            <i data-feather="align-right"></i>
            </button>
        </div>
        <div class="nav-wrapper">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                            <i data-feather="home" class="menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-contract" aria-expanded="false" aria-controls="ui-contract">
                        <i data-feather="grid" class="menu-icon text-primary"></i>
                        <span class="menu-title">Contract Management</span>
                        <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-contract">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/draft') }}">Draft</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/pending') }}">Pending</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/pendingFunding') }}">Pending Funding</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/active') }}">Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/rejected') }}">Rejected</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/matured') }}">Redemption</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/maturedRequest') }}">Redemption Req.</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#cms" aria-expanded="false" aria-controls="cms">
                    <i data-feather="slack" class="menu-icon text-danger"></i>
                    <span class="menu-title">CMS</span>
                    <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="cms">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/prices') }}">Prices</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/newsletters') }}">Newsletter</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#investors" aria-expanded="false" aria-controls="investors">
                    <i data-feather="codepen" class="menu-icon text-danger"></i>
                    <span class="menu-title">Investors</span>
                    <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="investors">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Investors Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/deactive-invester') }}">Investors in-active</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/messages') }}">
                        <i data-feather="mail" class="menu-icon"></i>
                        <span class="menu-title">Email Investors</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/chatify') }}">
                        <i data-feather="message-circle" class="menu-icon"></i>
                        <span class="menu-title">Contact Support</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('flashmsgs.index') }}">
                        <i data-feather="zap" class="menu-icon"></i>
                        <span class="menu-title">Flash Messages</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/settings') }}">
                        <i data-feather="settings" class="menu-icon"></i>
                        <span class="menu-title">Settings</span>
                    </a>
                </li>   
                
                
            </ul>
        </div>
    </div>
</nav>
    <script>
        $( document ).ready(function() {
            setInterval(function () {
                sessionCheckingLogin();
            }, 60000);
        });
    </script>

