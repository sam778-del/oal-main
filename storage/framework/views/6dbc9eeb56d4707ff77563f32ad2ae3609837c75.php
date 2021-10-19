<?php $__env->startSection('content'); ?>
<style type="text/css">
    .messenger {
        min-height: 500px !important;
        height:auto !important;
    } 
    .badge-sb-danger {
        position: absolute;
        margin: -6px 0 0 -8px;
    }
    .navbar {
         padding: 0px !important; 
    }
    .svg-inline--fa.fa-w-14 {
        width: 0.800em;
    }.message-hint {
        margin: 92px 0 0 0 !important;
    }

</style>
<div class="main-container">
    <div class="container-fluid">
          <?php echo $__env->make('Chatify::layouts.headLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!--<?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
        <div class="main-panel">
            <!-- content-wrapper Starts -->
            <div class="content-wrapper">
                <!-- design1 -->
                <div class="col-lg-12 card-margin asd">
                    <div class="card">
                        <div class="card-body">
                            <div class="messenger">
                                
                                <div class="messenger-listView">
                                    
                                    <div class="m-header">
                                        <nav>
                                            <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">Contact Support <?php echo e(config('chatify.pathinv')); ?></span> </a>
                                            
                                            <nav class="m-header-right">
                                                <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                                                <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                                            </nav>
                                        </nav>
                                        
                                        <input type="text" class="messenger-search" placeholder="Search" />
                                        
                                        <div class="messenger-listView-tabs">
                                            <a href="#" <?php if($route == 'user'): ?> class="active-tab" <?php endif; ?> data-view="users">
                                                <span class="far fa-user"></span> People</a>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="m-body">
                                       
                                       
                                       <div class="<?php if($route == 'user'): ?> show <?php endif; ?> messenger-tab app-scroll" data-view="users">

                                           
                                           <p class="messenger-title">Favorites</p>
                                            <div class="messenger-favorites app-scroll-thin"></div>

                                           
                                           <?php echo view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render(); ?>


                                           
                                           <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);"></div>
                                           
                                       </div>

                                       
                                       <div class="<?php if($route == 'group'): ?> show <?php endif; ?> messenger-tab app-scroll" data-view="groups">
                                            
                                            <p style="text-align: center;color:grey;">Soon will be available</p>
                                         </div>

                                         
                                       <div class="messenger-tab app-scroll" data-view="search">
                                            
                                            <p class="messenger-title">Search</p>
                                            <div class="search-records">
                                                <p class="message-hint"><span>Type to search..</span></p>
                                            </div>
                                         </div>
                                    </div>
                                </div>

                                
                                <div class="messenger-messagingView">
                                    
                                    <div class="m-header m-header-messaging">
                                        <nav>
                                            
                                            <div style="display: inline-flex;">
                                                <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                                <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                                </div>
                                                <a href="#" class="user-name"><?php echo e(config('chatify.name')); ?></a>
                                            </div>
                                            
                                            <nav class="m-header-right">
                                                <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                                <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                            </nav>
                                        </nav>
                                    </div>
                                    
                                    <div class="internet-connection">
                                        <span class="ic-connected">Connected</span>
                                        <span class="ic-connecting">Connecting...</span>
                                        <span class="ic-noInternet">No internet access</span>
                                    </div>
                                    
                                    <div class="m-body app-scroll">
                                        <div class="messages">
                                            <p class="message-hint" style="margin-top: calc(30% - 126.2px);"><span>Please select a chat to start messaging</span></p>
                                        </div>
                                        
                                        <div class="typing-indicator">
                                            <div class="message-card typing">
                                                <p>
                                                    <span class="typing-dots">
                                                        <span class="dot dot-1"></span>
                                                        <span class="dot dot-2"></span>
                                                        <span class="dot dot-3"></span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <?php echo $__env->make('Chatify::layouts.sendForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                
                                <div class="messenger-infoView app-scroll">
                                    
                                    <nav>
                                        <a href="#"><i class="fas fa-times"></i></a>
                                    </nav>
                                    <?php echo view('Chatify::layouts.info')->render(); ?>

                                </div>
                            </div>

                            <?php echo $__env->make('Chatify::layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('Chatify::layouts.footerLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('admin.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/chatify.blade.php ENDPATH**/ ?>