<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <!-- main-panel starts -->
        <div class="main-panel">
            <!-- content-wrapper Starts -->
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-margin widget-34">
                            <div class="card-body widget-34-container">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="widget-34-title">
                                            Welcome, <?php echo e(Auth::user()->name); ?>! 
                                        </div>
                                        <div class="widget-34-content">
                                            We will help you to conquer your goal
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 col-sm-6 col-6">
                                <div class="widget-35 card-margin border-base">
                                    <div class="widget-35-title">
                                        Active
                                    </div>
                                    <div class="widget-35-number">
                                        <?php echo e($total_active); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-sm-6 col-6">
                                <div class="widget-35 card-margin border-base">
                                    <div class="widget-35-title">
                                        Pending
                                    </div>
                                    <div class="widget-35-number">
                                        <?php echo e($total_pending); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-sm-6 col-6">
                                <div class="widget-35 card-margin border-base">
                                    <div class="widget-35-title">
                                        Pending Funding
                                    </div>
                                    <div class="widget-35-number">
                                        <?php echo e($total_pending_funding); ?> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-sm-6 col-6">
                                <div class="widget-35 card-margin border-base">
                                    <div class="widget-35-title">
                                        Reject
                                    </div>
                                    <div class="widget-35-number">
                                        <?php echo e($total_rejected); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card card-margin card-rounded flex-grow-1">
                            <div class="card-header">
                                <h5 class="card-title">Country wise invest Statistics</h5>
                            </div>
                            <div class="card-body">
                                <div class="widget-5">
                                    <div class="widget-5-canvas">
                                        <canvas id="canvas-stats" height="200" class="widget-5-canvas-chart"></canvas>
                                    </div>
                                    <div class="widget-5-canvas-bifurcation">
                                        <div class="widget-5-bifurcation">
                                            <div class="widget-5-progress">
                                                <div class="widget-5-progress-figure">40%</div>
                                                <div class="widget-5-progress-title">India</div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="widget-5-bifurcation">
                                            <div class="widget-5-progress">
                                                <div class="widget-5-progress-figure">55%</div>
                                                <div class="widget-5-progress-title">China</div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-base" role="progressbar" style="width: 55%" aria-valuenow="55"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="widget-5-bifurcation">
                                            <div class="widget-5-progress">
                                                <div class="widget-5-progress-figure">60%</div>
                                                <div class="widget-5-progress-title">US</div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="widget-5-bifurcation">
                                            <div class="widget-5-progress">
                                                <div class="widget-5-progress-figure">30%</div>
                                                <div class="widget-5-progress-title">UK</div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="widget-5-bifurcation">
                                            <div class="widget-5-progress">
                                                <div class="widget-5-progress-figure">80%</div>
                                                <div class="widget-5-progress-title">Australia</div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="widget-5-bifurcation">
                                            <div class="widget-5-progress">
                                                <div class="widget-5-progress-figure">45%</div>
                                                <div class="widget-5-progress-title">Canada</div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 45%" aria-valuenow="45"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card card-margin flex-grow-1">
                            <div class="card-header">
                                <h5 class="card-title">Revenue</h5>
                            </div>
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs nav-tabs-block justify-content-center" id="nav-tab1" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-week-tab1" data-toggle="tab" href="#nav-week1" role="tab" aria-controls="nav-week1" aria-selected="true">Weekly</a>
                                        <a class="nav-item nav-link" id="nav-month-tab1" data-toggle="tab" href="#nav-month1" role="tab" aria-controls="nav-month1" aria-selected="false">Monthly</a>
                                        <a class="nav-item nav-link" id="nav-year-tab1" data-toggle="tab" href="#nav-year1" role="tab" aria-controls="nav-year1" aria-selected="false">Yearly</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-0 pr-0" id="nav-tabContent1">
                                    <div class="tab-pane fade show active" id="nav-week1" role="tabpanel" aria-labelledby="nav-week-tab1">
                                        <div class="widget-7">
                                            <div class="widghet-7-date-filters">
                                                <a href="javascript:void(0);" class="btn btn-sm shadow-none" id="daterange-picker-1">
                                                <i data-feather="calendar"></i>
                                                <span>July 21 - August 19</span>
                                                </a>
                                            </div>
                                            <div class="widghet-7-chart">
                                                <canvas id="revenue-weekly" height="279"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-month1" role="tabpanel" aria-labelledby="nav-month-tab1">
                                        <div class="widget-7">
                                            <div class="widghet-7-date-filters">
                                                <a href="javascript:void(0);" class="btn btn-sm shadow-none" id="daterange-picker-2">
                                                <i data-feather="calendar"></i>
                                                <span>July 21 - August 19</span>
                                                </a>
                                            </div>
                                            <div class="widghet-7-chart">
                                                <canvas id="revenue-monthly" height="279"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-year1" role="tabpanel" aria-labelledby="nav-year-tab1">
                                        <div class="widget-7">
                                            <div class="widghet-7-date-filters">
                                                <a href="javascript:void(0);" class="btn btn-sm shadow-none" id="daterange-picker-3">
                                                <i data-feather="calendar"></i>
                                                <span>July 21 - August 19</span>
                                                </a>
                                            </div>
                                            <div class="widghet-7-chart">
                                                <canvas id="revenue-yearly" height="279"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>-->
                
                <!--<div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card card-rounded">
                            <div class="card-header">
                                <h5 class="card-title">Contry Investor</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table widget-6">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-top-0">
                                                            <div class="widget-6-title-wrapper">
                                                                <div class="widget-6-product-info">
                                                                    <div class="title"><i class="flag-icon flag-icon-in" title="in" id="in"></i> India</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-top-0">
                                                            <div class="widget-6-desc">
                                                                <div class="widget-6-order-wrapper">
                                                                    <div class="figure">231K</div>
                                                                    <div class="desc">Total Orders</div>
                                                                </div>
                                                                <div class="widget-6-return-wrapper">
                                                                    <div class="figure">12K
                                                                        <small class="text-danger"><strong>23%</strong> <i data-feather="arrow-down"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Returns</div>
                                                                </div>
                                                                <div class="widget-6-earning-wrapper">
                                                                    <div class="figure">31M
                                                                        <small class="text-success"><strong>23%</strong> <i data-feather="arrow-up"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Earnings</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="widget-6-title-wrapper">
                                                                <div class="widget-6-product-info">
                                                                    <div class="title"><i class="flag-icon flag-icon-cn" title="cn" id="cn"></i> China</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-6-desc">
                                                                <div class="widget-6-order-wrapper">
                                                                    <div class="figure">389K</div>
                                                                    <div class="desc">Total Orders</div>
                                                                </div>
                                                                <div class="widget-6-return-wrapper">
                                                                    <div class="figure">18K
                                                                        <small class="text-danger"><strong>10%</strong> <i data-feather="arrow-down"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Returns</div>
                                                                </div>
                                                                <div class="widget-6-earning-wrapper">
                                                                    <div class="figure">25M
                                                                        <small class="text-success"><strong>38%</strong> <i data-feather="arrow-up"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Earnings</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="widget-6-title-wrapper">
                                                                <div class="widget-6-product-info">
                                                                    <div class="title"><i class="flag-icon flag-icon-us" title="us" id="us"></i> United States</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-6-desc">
                                                                <div class="widget-6-order-wrapper">
                                                                    <div class="figure">210K</div>
                                                                    <div class="desc">Total Orders</div>
                                                                </div>
                                                                <div class="widget-6-return-wrapper">
                                                                    <div class="figure">10K
                                                                        <small class="text-danger"><strong>5%</strong> <i data-feather="arrow-down"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Returns</div>
                                                                </div>
                                                                <div class="widget-6-earning-wrapper">
                                                                    <div class="figure">19M
                                                                        <small class="text-success"><strong>15%</strong> <i data-feather="arrow-up"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Earnings</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="widget-6-title-wrapper">
                                                                <div class="widget-6-product-info">
                                                                    <div class="title"><i class="flag-icon flag-icon-gb" title="gb" id="gb"></i> Great Britain</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-6-desc">
                                                                <div class="widget-6-order-wrapper">
                                                                    <div class="figure">192K</div>
                                                                    <div class="desc">Total Orders</div>
                                                                </div>
                                                                <div class="widget-6-return-wrapper">
                                                                    <div class="figure">6K
                                                                        <small class="text-danger"><strong>2%</strong> <i data-feather="arrow-down"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Returns</div>
                                                                </div>
                                                                <div class="widget-6-earning-wrapper">
                                                                    <div class="figure">8M
                                                                        <small class="text-success"><strong>46%</strong> <i data-feather="arrow-up"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Earnings</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="widget-6-title-wrapper">
                                                                <div class="widget-6-product-info">
                                                                    <div class="title"><i class="flag-icon flag-icon-au" title="au" id="au"></i> Australia</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-6-desc">
                                                                <div class="widget-6-order-wrapper">
                                                                    <div class="figure">154K</div>
                                                                    <div class="desc">Total Orders</div>
                                                                </div>
                                                                <div class="widget-6-return-wrapper">
                                                                    <div class="figure">5K
                                                                        <small class="text-danger"><strong>1.8%</strong> <i data-feather="arrow-down"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Returns</div>
                                                                </div>
                                                                <div class="widget-6-earning-wrapper">
                                                                    <div class="figure">4M
                                                                        <small class="text-success"><strong>34%</strong> <i data-feather="arrow-up"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Earnings</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="widget-6-title-wrapper">
                                                                <div class="widget-6-product-info">
                                                                    <div class="title"><i class="flag-icon flag-icon-ca" title="ca" id="ca"></i> Canada</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-6-desc">
                                                                <div class="widget-6-order-wrapper">
                                                                    <div class="figure">128K</div>
                                                                    <div class="desc">Total Orders</div>
                                                                </div>
                                                                <div class="widget-6-return-wrapper">
                                                                    <div class="figure">4K
                                                                        <small class="text-danger"><strong>1.2%</strong> <i data-feather="arrow-down"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Returns</div>
                                                                </div>
                                                                <div class="widget-6-earning-wrapper">
                                                                    <div class="figure">2M
                                                                        <small class="text-success"><strong>28%</strong> <i data-feather="arrow-up"></i></small>
                                                                    </div>
                                                                    <div class="desc">Total Earnings</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="map-world"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
            <!-- content-wrapper ends -->
            
            <?php echo $__env->make('admin.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<script src="<?php echo e(asset('admin/js/components/legacy-sidebar/dashboard-msb.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>