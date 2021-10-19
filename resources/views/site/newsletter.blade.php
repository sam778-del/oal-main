
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Newsletter | Olympus Asset Limited</title>
    
    @include('site.Elements.header')
</head>
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>

@include('site.Elements.menu')



<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header bg-newsletter section-nav-smooth parallax padding_half">
    <div class="overlay overlay-dark opacity-5 z-index-1"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-bold mt-md-5 mt-lg-5">Newsletter</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->

<!-- Our Blogs -->
<section id="our-blog" class="bglight padding_top_half padding_bottom_half">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white heading_space_half wow fadeInUp text-center p-3 shadow">
                    <h4 class="text-capitalize darkcolor bottom20">search By Keyword</h4>
                    <form class="widget_search">
                        <div class="input-group">
                            <label for="search" class="d-none"></label>
                            <input type="search" class="form-control" placeholder="Search..." id="search" required>
                            <button type="submit" class="input-group-addon"><i class="fa fa-search"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="blog-measonry" class="cbp">

            @foreach ($news as $new)
            <div class="cbp-item">
                <div class="news_item shadow text-center text-md-left">

                    <?php if(!empty($new->image)){ ?>
                        <a class="image" href="{{ url('newsletter-details.html/'.$new->id) }}">
                            <img src="{{ asset('/project_img/newsletter/images/'.$new->image) }}" alt="image" class="img-responsive" style="height: 236px;">
                        </a>
                    <?php }else{ ?>
                        <a class="image" href="{{ url('newsletter-details.html/'.$new->id) }}">
                            <img src="{{ asset('/project_img/newsletter/newsletter-icon.jpg') }}" alt="image" class="img-responsive" style="height: 236px;">
                        </a>
                    <?php } ?>
                    
                    <div class="news_desc">
                        <h3 class="text-capitalize font-normal darkcolor">
                            <a href="{{ url('newsletter-details.html/'.$new->id) }}">{{ str_limit($new->title, 30) }}</a>
                        </h3>
                        <ul class="meta-tags top15 bottom15">
                            <li><a href="javascript:void(0);"><i class="fas fa-calendar-alt"></i>{{ date('d-M-y', strtotime($new->updated_at)) }}</a></li>
                            <li><a href="javascript:void(0);"> <i class="far fa-user"></i> admin </a></li>
                        </ul>
                        <p class="bottom35">
                            {!! str_limit(strip_tags($new->detail), 90) !!}

                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-sm-12">
                <!--Pagination-->
                {!! $news->links() !!}
            </div>
        </div>
    </div>
</section>
<!--Our Blogs Ends-->



@include('site.Elements.footer')

</body>
</html>