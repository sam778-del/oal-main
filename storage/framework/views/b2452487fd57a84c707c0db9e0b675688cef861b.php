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
                        <img src="<?php echo e(asset('admin/images/avatars/user-1.jpg')); ?>" alt="Profile Picture">
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
                        <a href=" <?php echo e(url($notification->link)); ?>" class="email-subject"> <?php echo e($notification->message); ?></a>
                        <small> <?php echo e($notification->created_at); ?></small>
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
            <a class="brand-logo" href="<?php echo e(url('/investor/dashboard')); ?>"><img src="<?php echo e(asset('logo.png')); ?>"
                alt="OAL Dashboard" title="OAL Dashboard"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
                <a class="nav-link count-highlighter" id="notificationToolbar" href="#">
                    <i class="fas fa-bell"></i>
                    <span class="badge badge-sb-danger notification-count-inside"><?php echo $noti_count; ?> </span>
                </a>
            </li>

           
            <li class="nav-item nav-profile">
                <a class="nav-link" href="<?php echo e(url('/investor/profile')); ?>">
                    <img src="<?php echo e(asset('admin/images/avatars/user-9.jpg')); ?>" alt="Profile Pic" />
                </a>
            </li>
            
            <li class="nav-item nav-profile">
                <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
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
            <a class="brand-logo" href="<?php echo e(url('/investor/dashboard')); ?>">
            <img src="<?php echo e(asset('logo.png')); ?>" alt="OAL Dashboard" title="OAL Dashboard"/>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="lgy-sb">
            <i data-feather="align-right"></i>
            </button>
        </div>
        <div class="nav-wrapper">
            <ul class="nav">

               
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/investor/dashboard')); ?>">
                        <i data-feather="home" class="menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/investor/profile')); ?>">
                        <i data-feather="user" class="menu-icon"></i>
                        <span class="menu-title">My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/investor/subscriptions')); ?>">
                        <i data-feather="file" class="menu-icon"></i>
                        <span class="menu-title">My Investment</span>
                    </a>
                </li>

                <?php if(!empty($subscriptionGobal)): ?>
                    <?php if($subscriptionGobal->bank_doc_request == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/investor/uploadBankslip')); ?>">
                                <i data-feather="book" class="menu-icon"></i>
                                <span class="menu-title">Upload Doc</span>
                                <span class="badge badge-sb-primary">1</span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/investor/newsletters')); ?>">
                        <i data-feather="message-square" class="menu-icon"></i>
                        <span class="menu-title">Newsletters</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/investor/messages')); ?>">
                        <i data-feather="mail" class="menu-icon"></i>
                        <span class="menu-title">Email From Admin</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/chatify/investor')); ?>">
                        <i data-feather="message-circle" class="menu-icon"></i>
                        <span class="menu-title">Contact Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/investor/flashmsgs')); ?>">
                        <i data-feather="zap" class="menu-icon"></i>
                        <span class="menu-title">Flash Messages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/investor/settings')); ?>">
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

<?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/investor/elements/sidebar.blade.php ENDPATH**/ ?>