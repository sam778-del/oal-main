
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home | Olympus Asset Limited</title>
    
    <?php echo $__env->make('site.Elements.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title pt-1" id="staticBackdropLabel">Disclaimer</h3>
                <div>
                    <img src="<?php echo e(asset('').'site/assets/img/oal_logo.webp'); ?>" width="40px">
                </div> 

            </div>
            <div class="modal-body">
                <p>This webpage contains important legal and proprietary information concerning Olympus Asset Limited (“Olympus Asset”). Before proceeding, please read the following disclaimer statements.</p>
                <p>
                    By clicking the “ACCEPT” button, you are deemed to be representing and warranting that (1) you have read and understand the information contained in this page and accept the terms and conditions contained herein, (2) the applicable laws and regulations of your jurisdiction allow you to access the information on this webpage, (3) you are duly authorized to access this webpage for the purpose of acquiring information, and (4) you or any other person or entity you represent initiated the discussion, correspondence or other communications with Olympus Asset or its representatives, which resulted in your requesting access to Olympus Asset’s website and the information regarding the company, and none of Olympus Asset or its representatives at any time directly or indirectly contacted you with respect to the provision of investment advisory services prior to such unsolicited initiation of discussions, correspondence or other communications.
                </p>
                <p>
                    The information on this webpage is not intended for persons located or resident in jurisdictions where the distribution of such information is restricted or unauthorized.
                </p>
                <p>
                    To the best of its knowledge and belief, Olympus Asset considers the information contained herein as accurate as at the date of publication. All information and opinions in this webpage are subject to change without notice. No representation or warranty is given, whether express or implied, on the accuracy, adequacy or completeness of information provided in the website or by third parties. The materials in this webpage could include technical inaccuracies or typographical errors, and could become inaccurate as a result of developments occurring after their respective dates. Any links to other websites contained within this webpage are for the convenience of the user only and do not constitute an endorsement by Olympus Asset of these websites. Olympus Asset is not responsible for the content of other websites referenced in this webpage. Neither Olympus Asset nor its affiliates and their respective shareholders, directors, officers and employees assume any liabilities in respect of any errors or omissions on this webpage, or any and all responsibility for any direct or consequential loss or damage of any kind resulting directly or indirectly from the use of this webpage. Unless otherwise expressly agreed with Olympus Asset, any use, disclosure, reproduction, modification or distribution of the contents of this webpage, or any part thereof, is strictly prohibited. Olympus Asset expressly disclaims any liability, whether in contract, tort, strict liability or otherwise, for any direct, indirect, incidental, consequential, punitive or special damages arising out of, or in any way connected with, your access to or use of this website.
                </p>
                <p>
                    This webpage is not an advertisement and is not intended for public use or distribution. This website is for the purpose of providing general information only without taking account of any particular investor’s objectives, financial situation or needs and does not amount to an investment recommendation. An investor should, before making any investment decision, consider the appropriateness of the information in this website, and seek professional advice, having regard to the investor’s objectives, financial situation and needs. In all cases, anyone proposing to rely on or use the information contained in the website should independently verify and check the accuracy, reliability, completeness, and suitability of the information. The information contained in this webpage does not constitute financial, investment, legal, accounting, tax or other professional advice or a solicitation for investment in Olympus Asset, nor does it constitute an offer for sale of interests in whatsoever form that are managed or advised by Olympus Asset. Any offer can only be made by the relevant offering documents, together with the relevant subscription agreement, all of which must be read and understood in their entirety, and only in jurisdictions where such an offer is compliant with relevant laws and regulatory requirements.
                </p>
                <p>
                    Simulations, past and projected performance may not necessarily be indicative of future results. Figures may be taken from sources that are believed to be reliable (but may not necessarily have been independently verified), and such figures should not be relied upon in making investment decisions. Olympus Asset, its officers and employees do not assume any responsibility for the accuracy or completeness of such information.
                </p>
                <p>
                    Please click “ACCEPT” if you confirm to have read, understood and agree that you fall within any of the aforementioned categories and to abide the Terms of Use, otherwise, please click  “REJECT” to leave the website.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="button btn-dark" data-dismiss="modal" onclick="closeMe()">Reject</button>
                <button type="button" class="button gradient-btn" data-dismiss="modal" onclick="acceptMe()">Accept</button>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('site.Elements.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--Main Slider-->
<section id="main-banner-area" class="position-relative">
    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
        <div id="rev_main" class="rev_slider fullwidthabanner white" data-version="5.4.1">
            <ul>
                <!-- SLIDE 1 -->

                <li data-index="rs-01" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="01">                    
                    <!-- MAIN IMAGE -->
                    <div class="overlay overlay-dark opacity-5"></div>
                    <img src="<?php echo e(asset('').'site/assets/img/mainbanner-1.jpg'); ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-50','-20']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-bold whitecolor text-center">Blockchain Technology</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','10','40']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1500"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-xlight whitecolor text-center">Decentralisation & Transparency</h1>
                    </div>
                </li>
                <!-- SLIDE 2 -->
                <li data-index="rs-02" data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="02">
                    <!-- MAIN IMAGE -->
                    <div class="overlay overlay-dark opacity-5"></div>
                    <img src="<?php echo e(asset('').'site/assets/img/mainbanner-2.jpg'); ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-50','-20']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-bold whitecolor text-center">AI & Big Data</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','10','40']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1500"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-xlight whitecolor text-center">Personalizing Customer Experiences</h1>
                    </div>
                </li>
                <!-- SLIDE 3 -->
                <li data-index="rs-03" data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="03">
                    <!-- MAIN IMAGE -->
                    <div class="overlay overlay-dark opacity-5"></div>
                    <img src="<?php echo e(asset('').'site/assets/img/mainbanner-3.jpg'); ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-50','-20']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-bold whitecolor text-center">Machine Learning</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','10','40']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1500"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-xlight whitecolor text-center">Quantitative Finance</h1>
                    </div>
                </li>
                <li data-index="rs-04" data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="04">
                    <!-- MAIN IMAGE -->
                    <div class="overlay overlay-dark opacity-5"></div>
                    <img src="<?php echo e(asset('').'site/assets/img/mainbanner-4.jpg'); ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-50','-20']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-bold whitecolor text-center">Proprietary Algorithm</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','10','40']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1500"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-capitalize font-xlight whitecolor text-center">Automation, Accuracy and speed</h1>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <a href="#testinomila_page" class="scroll-down pagescroll hover-default">Scroll Down <i class="fas fa-long-arrow-alt-down"></i></a>
</section>
<!--Main Slider ends -->



<header class="site-header" id="headerCount">
    <div class="countBottom">
        <div class="container">
            <div class="row align-items-center text-center py-4">
                <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                    <div class="counters whitecolor top10 bottom10">
                        <span class="count_nums font-light" data-to="<?php echo e($price->latest_price); ?>" data-speed="2500" data-decimals="2"> </span>
                    </div>
                    <h3 class="font-light whitecolor top10 count_sub_text">Latest Price (USD)</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 my-5 my-sm-0">
                   <div class="counters whitecolor top10 bottom10">
                        <span class="count_days font-light"> <?php echo e(date('d-M-y', strtotime($price->dealing_date))); ?></span>
                    </div>
                    <h3 class="font-light whitecolor top10 count_sub_text">Last Dealing Date</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                    <div class="counters whitecolor top10 bottom10">
                        <span class="count_nums font-light" data-to="<?php echo e($price->ytd_return); ?>" data-speed="2500" data-decimals="4"> </span>
                    </div>
                    <h3 class="font-light whitecolor top10 count_sub_text">Latest Cumulative Return (%)</h3>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="bg-light py-10 threeDesc" id="our-feature">
    <div class="container">
        <div class="row text-center pt-5">
            <div class="col-lg-4 mb-5 mb-lg-0 f-15 wow fadeInDown" data-wow-delay="200ms">
                <div class="icon-stack icon-stack-xl color-blue mb-4">
                    <i class="fa fa-globe"></i>
                </div>
                <h3>Integrity</h3>
                <p class="mb-0">We conduct ourselves with integrity in everything we do</p>
                <a href="corporate-values.html" class="button-readmore">Read more</a>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0 f-15 wow fadeInDown" data-wow-delay="200ms">
                <div class="icon-stack icon-stack-xl color-blue mb-4">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Respect</h3>
                <p class="mb-0">We believe that our employees work effectively and collaboratively because of the respect with which the company and they treat one another</p>
                <a href="corporate-values.html" class="button-readmore">Read more</a>
            </div>
            <div class="col-lg-4 f-15 wow fadeInDown" data-wow-delay="200ms">
                <div class="icon-stack icon-stack-xl color-blue mb-4">
                    <i class="fas fa-medal"></i>
                </div>
                <h3>Excellence</h3>
                <p class="mb-0">It is our passion and aspiration to pursue excellence as individuals and as a company</p>
                <a href="corporate-values.html" class="button-readmore">Read more</a>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <svg viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" /></svg>
    </div>
</section>

<section id="testinomila_page" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center heading_space wow fadeIn">
                <h2 class="heading bottom30 darkcolor font-light2 wow fadeInUp">
                    <span class="font-weight-light">Who </span> We Are
                    <span class="divider-center"></span>
                </h2>
                <div class="col-md-8 offset-md-2">
                    <p class="f-15 wow fadeInUp" data-wow-delay="200ms">
                        Olympus Asset Ltd (Company no: 165016), a private company with limited liability incorporated under the laws of Mauritius, holds a Global Business Company License (C119024137) issued by the Mauritius FSC pursuant to the provisions of the FSA, and authorized as a Collective Investment Scheme under Section 97 of the Securities Act 2005.
                    </p>
                    <p class="f-15 wow fadeInUp" data-wow-delay="300ms">
                        Our expertise has been developed over 40 years in alternative asset management. This expertise has been achieved in the area of applying IT and artificial intelligence to data-mining, including the use of supercomputers, to extract useful information that may be effective in making trading profits from financial markets. Our principals have worked with some of the leading and most reputable global organizations in these fields.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="our-services" class="padding bglight">
    <div class="text-center">
        <h2 class="heading bottom30 darkcolor font-light2 wow fadeInUp"> Methodology
            <span class="divider-center"></span>
        </h2> 
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 wow fadeInLeft" data-wow-delay="300ms">
                <div class="cbp-item digital brand design">
                    <div class="services-main">
                        <div class="image bottom10">
                            <div class="image"><img alt="SEO" src="<?php echo e(asset('').'site/assets/img/banner-1.jpg'); ?>"></div>
                            <div class="overlay">
                                <a href="methdology.html" class="overlay_center border_radius">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="services-content brand text-center text-md-left">
                            <h3 class="bottom10 darkcolor"><a href="methdology.html">Investment Strategy</a></h3>
                            <p class="bottom15">We invest in the financial technology sector where our operating experience gives us a competitive advantage.
                            </p>
                            <a href="methdology.html" class="button-readmore">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeInRight" data-wow-delay="300ms">
                <div class="cbp-item digital graphics">
                    <div class="services-main">
                        <div class="image bottom10">
                            <div class="image"><img alt="SEO" src="<?php echo e(asset('').'site/assets/img/banner-2.jpg'); ?>"></div>
                            <div class="overlay">
                                <a href="methdology.html" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="services-content text-center text-md-left">
                            <h3 class="bottom10 darkcolor"><a href="methdology.html">Our Approach</a></h3>
                            <p class="bottom15">We identify promising new fintech companies, technology start-ups or other companies with innovative systematic.
                            </p>
                            <a href="methdology.html" class="button-readmore">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="steps" class="steps section-bg">
    <div class="container">
        <div class="text-center">
            <h2 class="heading bottom30 darkcolor font-light2 wow fadeInUp">
                Our <span class="font-weight-light">Trusted</span> Partners
                <span class="divider-center"></span>
            </h2>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-6 content-item wow fadeInUp d-flex align-items-center justify-content-center" data-wow-delay="300ms">
                <div>
                    <a href="https://www.afrasiabank.com" target="blank"><img alt="" src="<?php echo e(asset('').'site/assets/img/logo/afrasia.webp'); ?>" width="100px" class="mt-n2"></a>
                    <h4>Afrasia Bank Limited</h4>
                    <p>BANK</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 content-item wow fadeInUp d-flex align-items-center justify-content-center" data-wow-delay="300ms">
                <div>
                    <a href="https://eservices.mas.gov.sg/cisnetportal/jsp/list.jsp" target="blank"><img alt="" src="<?php echo e(asset('').'site/assets/img/logo/olympus.webp'); ?>" width="60px" class="mt-2"></a>
                    <h4 class="mt-4">Olympus Asset SG</h4>
                    <p>REGISTERED FUND</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 content-item wow fadeInUp d-flex align-items-center justify-content-center" data-wow-delay="300ms">
                <div>
                    <a href="https://www.bdo.mu" target="blank"><img alt="" src="<?php echo e(asset('').'site/assets/img/logo/bdo.webp'); ?>" width="90px" class="mt-3"></a>
                    <h4 class="mt-4">BDO (Mauritius)</h4>
                    <p>AUDITOR</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 content-item wow fadeInUp d-flex align-items-center justify-content-center" data-wow-delay="300ms">
                <div>
                    <a href="https://www.mauriexperta.com" target="blank"><img alt="" src="<?php echo e(asset('').'site/assets/img/logo/mauri.webp'); ?>" width="100px" class="mt-2"></a>
                    <h4 class="mt-2">Mauri Experta Management Company</h4>
                    <p>FUND ADMINISTRATOR</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 content-item wow fadeInUp d-flex align-items-center justify-content-center" data-wow-delay="300ms">
                <div>
                    <a href="https://zetland.biz" target="blank"><img alt="" src="<?php echo e(asset('').'site/assets/img/logo/zetland.webp'); ?>" width="50px" class="mt-2"></a>
                    <h4 class="mt-3">Zetland Financial Group Limited</h4>
                    <p>ESCROW SERVICES</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 content-item wow fadeInUp d-flex align-items-center justify-content-center" data-wow-delay="300ms">
                <div>
                    <a href="https://www.fscmauritius.org/en/being-supervised/register-of-licensees-search-by-name" target="blank"><img alt="" src="<?php echo e(asset('').'site/assets/img/logo/fsc.webp'); ?>" width="50px"></a>
                    <h4 class="mt-3">FSC Mauritius</h4>
                    <p>FINANCIAL SERVICES COMMISSION MAURITIUS</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="stayconnect" class="position-relative">
    <div class="container">
        <div class="contactus-wrapp shadow">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="heading-title wow fadeInUp text-center text-md-left" data-wow-delay="300ms">
                        <h3 class="darkcolor bottom20">Got a question?</h3>
                        <p>
                             We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                        </p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <form class="getin_form wow fadeInUp" data-wow-delay="400ms" onsubmit="return false;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="result"></div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="userName" class="d-none"></label>
                                    <input class="form-control" type="text" placeholder="First Name:" required id="userName" name="userName">
                                </div>
                            </div>                            
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="d-none"></label>
                                    <input class="form-control" type="email" placeholder="Email:" required id="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <div class="form-group home-area">
                                    <label for="companyName" class="d-none"></label>
                                    <textarea class="form-control" id="validationTextarea" placeholder="Type your message here.." required></textarea> 
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 d-flex align-items-center">
                                <button type="submit" class="button gradient-btn w-100" id="submit_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="site-footer" class=" bgdark padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="footer_panel bottom20">
                    <h3 class="whitecolor bottom10">Address</h3>
                    <p class="whitecolor bottom10">
                        C/o Mauri Experta Ltd, 12th Level Tower I,
                        Nexteracom Towers Cybercity, Ebene Mauritius
                    </p>                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel bottom10">
                    <h3 class="whitecolor bottom10">Reach Us</h3>
                    <div class="d-table w-100 address-item whitecolor bottom10">
                        <p class="d-table-cell align-middle bottom0">
                            Email: <a href="mailto:web@support.com">contact@olympus-asset.com</a>
                        </p>
                    </div>
                    <!-- <ul class="social-icons white wow fadeInUp bottom10" data-wow-delay="300ms">
                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i> </a> </li>
                        <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</footer>

<?php echo $__env->make('site.Elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    <?php 
    if($disclaimer == '1'){ ?>
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    <?php } ?>
    
    function acceptMe(){
        var SITE_URL = "<?php echo e(url('/')); ?>/";
        var csrfToken = "<?php echo e(csrf_token()); ?>";
        let formData = new FormData();
        formData.set('disable', 'disable');
        axios.post(SITE_URL+'disclaimer',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-Token': csrfToken}}
        ).then(function (response) {

        });
    }
    function closeMe(){
        var win = window.open("about:blank", "_self");
        win.close();
    }
</script>
</body>
</html>
<?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/site/index.blade.php ENDPATH**/ ?>