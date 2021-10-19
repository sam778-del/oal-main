
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Newsletter | Olympus Asset Limited</title>
    
    <?php echo $__env->make('site.Elements.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>


<?php echo $__env->make('site.Elements.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header bg-blog-post section-nav-smooth parallax padding_half">
    <div class="overlay overlay-dark opacity-5 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-bold mt-md-5 mt-lg-5"><?php echo e($news->title); ?></h2>
                </div> 
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->



<section id="our-blog" class="bglight padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news_item shadow">
                    <div class="image">

                        <?php if(!empty($news->image)){ ?>
                            <img src="<?php echo e(asset('/project_img/newsletter/images/'.$news->image)); ?>" alt="Latest News" class="img-responsive">
                        <?php }else{ ?>
                            <img src="<?php echo e(asset('/project_img/newsletter/newsletter-icon.jpg')); ?>" alt="Latest News" class="img-responsive">
                        <?php } ?>
                    </div>

                    <div class="news_desc text-center text-md-left">
                        <h3 class="text-capitalize font-normal darkcolor" style="font-size: 20px;">
                            <?php echo e($news->title); ?>

                        </h3>
                        <ul class="meta-tags top20 bottom20">
                            <li><a href="#."><i class="fas fa-calendar-alt"></i><?php echo e(date('d-M-y', strtotime($news->updated_at))); ?></a></li>
                            <li><a href="#."> <i class="far fa-user"></i> admin </a></li>

                        </ul>
                        <?php echo $news->detail; ?> 

                        <div class="row">
                            <div class="col-lg-6">
                                
                            </div>
                            
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <h4>Recent Posts</h4>
            </div>
            <div class="col text-right">
                <a href="<?php echo e(url("newsletter.html")); ?>">See all</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="services-measonry" class="cbp">

                    <?php $__currentLoopData = $recentNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
                        <div class="cbp-item digital brand design">
                            <div class="services-main">
                                <div class="image bottom10">
                                    <div class="image">

                                        <?php if(!empty($recent->image)){ ?>
                                            <a class="image" href="<?php echo e(url('newsletter-details.html/'.$recent->id)); ?>">
                                                <img src="<?php echo e(asset('/project_img/newsletter/images/'.$recent->image)); ?>" alt="image" class="img-responsive" style="height: 236px;">
                                            </a>
                                        <?php }else{ ?>
                                            <a class="image" href="<?php echo e(url('newsletter-details.html/'.$recent->id)); ?>">
                                                <img src="<?php echo e(asset('/project_img/newsletter/newsletter-icon.jpg')); ?>" alt="image" class="img-responsive" style="height: 236px;">
                                            </a>
                                        <?php } ?>
                            
                                    </div>
                                    <div class="overlay">
                                        <a href="{ url('newsletter-details.html/'.$recent->id) }}" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="services-content brand text-center text-md-left">
                                    <h3 class="bottom10 darkcolor" style="font-size: 15px;">
                                        <a href="<?php echo e(url('newsletter-details.html/'.$recent->id)); ?>"><?php echo e(str_limit($recent->title, 30)); ?></a>
                                    </h3>
                                    <ul class="meta-tags top15 bottom15">
                                        <li><a href="javascript:void(0);"><i class="fas fa-calendar-alt"></i><?php echo e(date('d-M-y', strtotime($recent->updated_at))); ?></a></li>
                                        <li><a href="javascript:void(0);"> <i class="far fa-user"></i> admin </a></li>
                                    </ul>
                                    <p class="bottom15">
                                        <?php echo str_limit($recent->detail, 100); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Our Blog Ends-->


<?php echo $__env->make('site.Elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/site/newsletterDetails.blade.php ENDPATH**/ ?>