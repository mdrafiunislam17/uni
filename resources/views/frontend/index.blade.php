@extends('frontend.includes.app')

@section('title')
Home Page
@endsection

@push('styles')


<!-- ✅ Optional: Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- ✅ Custom CSS -->



<style>
.carousel-caption {
  position: absolute !important;  /* নিশ্চিত করুন position absolute আছে */
  right: 50% !important;           /* বাম থেকে ৫০% */
  left: auto !important;          /* ডান থেকে না */
  top: 10% !important;             /* উপরের ৫০% */
  text-align: left !important;     /* টেক্সট বামে */
  max-width: 600px;                /* চাইলে max width দিন */
}

.slider-section .carousel-item img{
    height: 80vh;          /* চাইলে 300px, 60vh ইত্যাদি দিন */
    object-fit: cover;      /* ছবির চারদিক কেটে ফেলে অনুপাত ঠিক রাখে */
}


/* Import Kumbh Sans font */
@import url('https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playlist&display=swap');


.slider-section .carousel-caption {
  display: flex;
  flex-direction: column;
  align-items: flex-start;  /* বাম দিকে সবকিছু লাইন আপ হবে */
  gap: 15px;                /* উপাদানগুলোর মাঝে ফাঁকা থাকবে */
  padding: 20px;            /* একটু প্যাডিং দিবেন */
  max-width: 600px;         /* ক্যাপশনটাকে একটা নির্দিষ্ট প্রস্থ দিন */
}
.slider-section .carousel-caption h1 {
  font-family: 'Kumbh Sans', sans-serif;
  font-size: 101px;
  font-weight: 700;
  line-height: 93px;
  color: #fff;
  margin-bottom: 10px;
  text-align: left;
  text-transform: none;
  white-space: nowrap;
}

.slider-section .carousel-caption p {
  font-family: 'Kumbh Sans', sans-serif;
  font-size: 18px;
  line-height: 28px;
  color: #fff;
  margin-bottom: 20px;
  text-align: left;
  padding-top: 10px
}

.slider-section .carousel-caption span {
  font-family: 'Playlist', cursive;
  font-size: 70px;
  font-weight: 400;
  color: #fff;
  text-align: left;
  white-space: nowrap;
}

.slider-section .carousel-caption a.btn {
  font-family: 'Kumbh Sans', sans-serif;
  font-size: 16px;
  font-weight: 600;
  padding: 12px 30px;
  background-color: #324FC0;
  color: #fff;
  border: none;
  text-transform: uppercase;
  border-radius: 5px;
  transition: all 0.3s ease;
  text-align: left;
}

.slider-section .carousel-caption a.btn:hover {
  background-color: #000;
  color: #fff;
}




.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
  color: #fff !important;           /* White arrow icon */
  background: #fff;   /* Optional: dark background for contrast */
  border-radius: 50%;
  padding: 10px;
  margin: 5px;
  border: none;
}

.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
  background: #fff;   /* Darker on hover */
}



/* মোবাইলের জন্য responsive কোড */
@media (max-width: 991px) {
  .carousel-caption {
    right: 5% !important;   /* ডেস্কটপের ৫০% থেকে একটু বাম দিক */
    top: 15% !important;    /* একটু নিচে নামানো */
    max-width: 90vw !important; /* স্ক্রিনের ৯০% প্রস্থ */
    padding: 15px;
  }

  .slider-section .carousel-caption h1 {
    font-size: 50px;
    line-height: 55px;
    white-space: normal;  /* লাইন ব্রেক দিতে দাও */
  }

  .slider-section .carousel-caption span {
    font-size: 35px;
    white-space: normal;
  }

  .slider-section .carousel-caption p {
    font-size: 14px;
    line-height: 22px;
    padding-top: 5px;
    margin-bottom: 15px;
  }

  .slider-section .carousel-caption a.btn {
    font-size: 14px;
    padding: 10px 20px;
  }
}

/* ছোট স্ক্রিনের জন্য আরো ছোট মোবাইল (ফোন) */
@media (max-width: 575px) {
  .carousel-caption {
    right: 5% !important;
    top: 10% !important;
    max-width: 95vw !important;
    padding: 10px;
  }

  .slider-section .carousel-caption h1 {
    font-size: 35px;
    line-height: 40px;
  }

  .slider-section .carousel-caption span {
    font-size: 25px;
  }

  .slider-section .carousel-caption p {
    font-size: 12px;
    line-height: 18px;
  }

  .slider-section .carousel-caption a.btn {
    font-size: 12px;
    padding: 8px 15px;
  }
}



</style>
@endpush




@section('body')


    <div id="page-content">
            <!--page content-->



            <div id="wp-main-content" class="clearfix main-page">
                <div class="disable-breadcrumb clearfix"></div>
                <div class="container-layout-content container-full">
                    <div class="content-page-wrap">
                        <div class="main-page-content base-layout has-no-sidebar">

                            <div class="content-page clearfix">
                                <div class="content-page-inner">
                                    <div class="clearfix post-1213 page type-page status-publish hentry" id="1213">



                                        <div data-elementor-type="wp-page" data-elementor-id="1213" class="elementor elementor-1213">

                                    <!-- ✅ Slider Section Start -->
                                <section class="slider-section">
                                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('wp-content/uploads/2024/07/FM-Education-6.jpg') }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                            <span>We Work Harder</span>
                                            <h1>Education and <br /> Consulting</h1>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quidem. Distinctio autem eligendi suscipit,
                                                tempora explicabo illo quo quam delectus, voluptatum odit consequatur sapiente esse neque totam numquam aspernatur ex?
                                            </p>
                                            <a class="btn btn-primary" href="#">APPLY NOW</a>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('wp-content/uploads/2024/07/FM-Education-5.jpg') }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                            <h1>We Work Harder</h1>
                                            <h1>Education and <br /> Consulting</h1>
                                            <p>Some representative placeholder content for the second slide.</p>
                                              <a class="btn btn-primary" href="#">APPLY NOW</a>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('wp-content/uploads/2024/07/FM-Education-6.jpg') }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                            <h1>We Work Harder</h1>
                                            <h1>Education and <br /> Consulting</h1>
                                            <p>Some representative placeholder content for the third slide.</p>
                                              <a class="btn btn-primary" href="#">APPLY NOW</a>
                                            </div>
                                        </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </section>






                                <section class="elementor-section elementor-top-section elementor-element elementor-element-746f01d elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="746f01d" data-element_type="section">

                                        <div class="elementor-container elementor-column-gap-default">

                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3787379 column-style-top" data-id="3787379" data-element_type="column">

                                                <div class="elementor-widget-wrap elementor-element-populated">

                                                    <div class="elementor-element elementor-element-108a5f2 elementor-widget elementor-widget-gva-icon-box-group" data-id="108a5f2" data-element_type="widget" data-widget_type="gva-icon-box-group.default">

                                                        <div class="elementor-widget-container">

                                                            <div class="gva-element-gva-icon-box-group gva-element">

                                                                <div class="gsc-icon-box-group layout-carousel style-1">

                                                                    <div class="init-carousel-owl owl-carousel owl-loaded owl-drag" data-items="3" data-items_lg="3" data-items_md="3" data-items_sm="2" data-items_xs="2" data-items_xx="1" data-loop="1" data-speed="800" data-auto_play="0" data-auto_play_speed="800" data-auto_play_timeout="6000" data-auto_play_hover="1" data-navigation="1" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">

                                                                        <div class="owl-stage-outer">
                                                                            <div class="owl-stage" style="transform: translate3d(-2280px, 0px, 0px); transition: 0.8s; width: 3420px;"><div class="owl-item cloned" style="width: 380px;"><div class="item icon-box-item style-1 ">

                                                                                <div class="item-box">

                                                                                    <div class="item-box-content">

                                                                                        <div class="box-icon">

                                                                                            <span class="icon-inner">

                                                                                                <i aria-hidden="true" class=" las la-graduation-cap"></i>

                                                                                            </span>

                                                                                        </div>


                                                                                        <div class="box-content">

                                                                                            <h4 class="title">SFE Courses</h4>

                                                                                            <div class="desc">Level 4 to level 7 courses Funded by Student Finance</div>

                                                                                        </div>

                                                                                    </div>

                                                                                    <a href="#" class="link-overlay">

                                                                                    </a>

                                                                                </div>

                                                                            </div>

                                                                    </div>

                                                                    <div class="owl-item cloned" style="width: 380px;">
                                                                        <div class="item icon-box-item style-1 ">


                                                                            <div class="item-box">

                                                                            <div class="item-box-content">

                                                                                <div class="box-icon">

                                                                                    <span class="icon-inner">

                                                                                        <i aria-hidden="true" class=" flaticon-education"></i>

                                                                                    </span>

                                                                                </div>


                                                                                <div class="box-content">

                                                                                    <h4 class="title">Level 3 Courses</h4>

                                                                                    <div class="desc">Level 3 online courses for beginners</div>

                                                                                </div>

                                                                            </div>

                                                                            <a href="#" class="link-overlay"></a>


                                                                        </div>

                                                                    </div>


                                                                </div>


                                                                           <div class="owl-item cloned" style="width: 380px;">
                                                                        <div class="item icon-box-item style-1 ">


                                                                            <div class="item-box">

                                                                            <div class="item-box-content">

                                                                                <div class="box-icon">

                                                                                    <span class="icon-inner">

                                                                                          <i aria-hidden="true" class=" las la-school"></i>

                                                                                    </span>

                                                                                </div>


                                                                                <div class="box-content">

                                                                                    <h4 class="title">Self Funded Courses</h4>

                                                                                    <div class="desc">Level 3 online courses for beginners</div>

                                                                                </div>

                                                                            </div>

                                                                            <a href="#" class="link-overlay"></a>


                                                                        </div>

                                                                    </div>


                                                                </div>


                                                                <div class="owl-item" style="width: 380px;">

                                                                    <div class="item icon-box-item style-1 ">

                                                                        <div class="item-box">

                                                                            <div class="item-box-content">

                                                                                <div class="box-icon">

                                                                                    <span class="icon-inner">

                                                                                        <i aria-hidden="true" class=" las la-graduation-cap"></i>

                                                                                    </span>

                                                                                </div>


                                                                                <div class="box-content">

                                                                                    <h4 class="title">SFE Courses</h4>

                                                                                    <div class="desc">Level 4 to level 7 courses Funded by Student Finance</div>

                                                                                </div>

                                                                            </div>

                                                                            <a href="sfe-funded-courses/index.html" class="link-overlay">

                                                                            </a>

                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                <div class="owl-item" style="width: 380px;">

                                                                    <div class="item icon-box-item style-1 ">

                                                                        <div class="item-box">

                                                                            <div class="item-box-content">

                                                                                <div class="box-icon">

                                                                                    <span class="icon-inner">

                                                                                        <i aria-hidden="true" class=" flaticon-education"></i>

                                                                                    </span>


                                                                                </div>



                                                                                <div class="box-content">


                                                                                    <h4 class="title">Level 3 Courses</h4>


                                                                                    <div class="desc">Level 3 online courses for beginners</div>


                                                                                </div>

                                                                            </div>

                                                                            <a href="self-funded/index.html" class="link-overlay">

                                                                            </a>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="owl-item" style="width: 380px;">

                                                                    <div class="item icon-box-item style-1 ">

                                                                        <div class="item-box">

                                                                            <div class="item-box-content">


                                                                                <div class="box-icon">


                                                                                    <span class="icon-inner">


                                                                                        <i aria-hidden="true" class=" las la-school"></i>

                                                                                    </span>


                                                                                </div>


                                                                                <div class="box-content">


                                                                                    <h4 class="title">Self Funded Courses</h4>


                                                                                    <div class="desc">Level 3 self funded courses independently</div>


                                                                                </div>

                                                                            </div>

                                                                            <a href="free-courses/index.html" class="link-overlay">

                                                                            </a>

                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                <div class="owl-item cloned active first" style="width: 380px;">

                                                                    <div class="item icon-box-item style-1 ">


                                                                        <div class="item-box">


                                                                            <div class="item-box-content">


                                                                                <div class="box-icon">


                                                                                    <span class="icon-inner">

                                                                                        <i aria-hidden="true" class=" las la-graduation-cap"></i>

                                                                                    </span>


                                                                                </div>



                                                                                <div class="box-content">


                                                                                    <h4 class="title">SFE Courses</h4>


                                                                                    <div class="desc">Level 4 to level 7 courses Funded by Student Finance</div>


                                                                                </div>


                                                                            </div>


                                                                            <a href="sfe-funded-courses/index.html" class="link-overlay">


                                                                            </a>


                                                                        </div>


                                                                    </div>

                                                                </div>


                                                                <div class="owl-item cloned active center" style="width: 380px;">

                                                                    <div class="item icon-box-item style-1 ">


                                                                        <div class="item-box">



                                                                            <div class="item-box-content">


                                                                                <div class="box-icon">


                                                                                    <span class="icon-inner">


                                                                                        <i aria-hidden="true" class=" flaticon-education"></i>

                                                                                    </span>


                                                                                </div>



                                                                                <div class="box-content">


                                                                                    <h4 class="title">Level 3 Courses</h4>


                                                                                    <div class="desc">Level 3 online courses for beginners</div>


                                                                                </div>


                                                                            </div>


                                                                            <a href="self-funded/index.html" class="link-overlay">


                                                                            </a>


                                                                        </div>


                                                                    </div>

                                                                </div>


                                                                <div class="owl-item cloned active last" style="width: 380px;">

                                                                    <div class="item icon-box-item style-1 ">


                                                                        <div class="item-box">


                                                                            <div class="item-box-content">


                                                                                <div class="box-icon">


                                                                                    <span class="icon-inner">


                                                                                        <i aria-hidden="true" class=" las la-school"></i>

                                                                                    </span>


                                                                                </div>



                                                                                <div class="box-content">


                                                                                    <h4 class="title">Self Funded Courses</h4>


                                                                                    <div class="desc">Level 3 self funded courses independently</div>


                                                                                </div>


                                                                            </div>


                                                                            <a href="free-courses/index.html" class="link-overlay">


                                                                            </a>


                                                                        </div>


                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        <div class="owl-nav disabled">

                                                            <div role="presentation" class="owl-prev">

                                                                <span>

                                                                    <i class="las la-arrow-left"></i>

                                                                </span>

                                                            </div>

                                                            <div role="presentation" class="owl-next">

                                                                <span>

                                                                    <i class="las la-arrow-right"></i></span>

                                                                </div>

                                                            </div>

                                                            <div class="owl-dots disabled"></div>

                                                        </div>


                                                    </div>



                                                </div>

                                            </div>


                                        </div>


                                    </div>


                                </div>


                            </div>

                    </section>



                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-3bb62b8e elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="3bb62b8e" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-134f9bf3" data-id="134f9bf3" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-39b37ff2 elementor-widget elementor-widget-gva-image-content" data-id="39b37ff2" data-element_type="widget" data-widget_type="gva-image-content.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-image-content gva-element">
                                                                        <div class="clearfix gsc-image-content skin-v1">

                                                                            <div class="images">
                                                                                <div class="image-first">
                                                                                    <img decoding="async" src="https://fmeducation.co.uk/wp-content/uploads/2021/06/image-1.jpg" title="image-1" alt="image-1" loading="lazy" /> </div>

                                                                                <div class="image-second">
                                                                                    <div class="image-second-inner">
                                                                                        <img decoding="async" src="https://fmeducation.co.uk/wp-content/uploads/2024/05/5.jpg" alt="Trusted by 5000+ Students" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="box-content">
                                                                                <div class="content-inner">
                                                                                    <div class="icon">
                                                                                        <i aria-hidden="true" class=" flaticon-relationship"></i> </div>
                                                                                    <h2 class="title">
                                                                                        <span>Trusted by 5000+ Students</span>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>

                                                                            <div class="line-color"></div>

                                                                        </div>











                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-61a91a6d column-style-top" data-id="61a91a6d" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-197e843f elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="197e843f" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-7bef54e column-style-top" data-id="7bef54e" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-5f6a2163 elementor-widget elementor-widget-gva-heading-block" data-id="5f6a2163" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                                        <div class="align-left style-1 widget gsc-heading box-align-left auto-responsive">
                                                                                            <div class="content-inner">


                                                                                                <div class="sub-title"><span>About FM Education Hub</span></div>


                                                                                                <h2 class="title">
                                                                                                    <span>Your Path to Educational Excellence</span>
                                                                                                </h2>


                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <div class="elementor-element elementor-element-1edad1d2 elementor-widget elementor-widget-text-editor" data-id="1edad1d2" data-element_type="widget" data-widget_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <p>FM Education Hub is a respected education consultancy firm based in London.</p>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-cf1650f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="cf1650f" data-element_type="widget" data-widget_type="icon-list.default">
                                                                <div class="elementor-widget-container">
                                                                    <ul class="elementor-icon-list-items">
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">London's trusted consultancy firm</span>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text"> Expert career guidance offered</span>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text"> Exceptional student services</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-21c7c99 elementor-widget elementor-widget-html" data-id="21c7c99" data-element_type="widget" data-widget_type="html.default">
                                                                <div class="elementor-widget-container">
                                                                    <a class="btn-theme" href="https://fmeducation.co.uk/about/">Read More</a> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-e5a6009 elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="e5a6009" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-49773d0 column-style-top" data-id="49773d0" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-8a0bda4 elementor-widget elementor-widget-gva-heading-block" data-id="8a0bda4" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-left style-1 widget gsc-heading box-align- auto-responsive">
                                                                            <div class="content-inner">


                                                                                <div class="sub-title"><span>Facts About Us</span></div>


                                                                                <h2 class="title">
                                                                                    <span>Our Mission is to
Polish your skill</span>
                                                                                </h2>
                                                                                <div class="title-desc">Our A-Z consultation process enables you to be hired by the top universities in the UK.</div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4c59df1 column-style-top" data-id="4c59df1" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-0cf9af9 elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="0cf9af9" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-ce03431 column-style-top" data-id="ce03431" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-d655ce2 elementor-widget elementor-widget-gva-counter" data-id="d655ce2" data-element_type="widget" data-widget_type="gva-counter.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="gva-element-gva-counter gva-element">
                                                                                        <div class="widget milestone-block style-3">
                                                                                            <div class="box-content">
                                                                                                <div class="milestone-icon">
                                                                                                    <span class="icon">
                     <i aria-hidden="true" class=" flaticon-teacher"></i>                  </span>
                                                                                                </div>

                                                                                                <div class="milestone-content">
                                                                                                    <div class="milestone-number-inner">
                                                                                                        <span class="milestone-number">5125</span>
                                                                                                    </div>
                                                                                                    <div class="milestone-text">
                                                                                                        Students </div>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-236f227 column-style-top" data-id="236f227" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-b935209 elementor-widget elementor-widget-gva-counter" data-id="b935209" data-element_type="widget" data-widget_type="gva-counter.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="gva-element-gva-counter gva-element">
                                                                                        <div class="widget milestone-block style-3">
                                                                                            <div class="box-content">
                                                                                                <div class="milestone-icon">
                                                                                                    <span class="icon">
                     <i aria-hidden="true" class="far fa-grin-hearts"></i>                  </span>
                                                                                                </div>

                                                                                                <div class="milestone-content">
                                                                                                    <div class="milestone-number-inner">
                                                                                                        <span class="milestone-number">4280</span>
                                                                                                    </div>
                                                                                                    <div class="milestone-text">
                                                                                                        Reviews </div>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-428445b column-style-top" data-id="428445b" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-e6a2943 elementor-widget elementor-widget-gva-counter" data-id="e6a2943" data-element_type="widget" data-widget_type="gva-counter.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="gva-element-gva-counter gva-element">
                                                                                        <div class="widget milestone-block style-3">
                                                                                            <div class="box-content">
                                                                                                <div class="milestone-icon">
                                                                                                    <span class="icon">
                     <i aria-hidden="true" class=" flaticon-student-1"></i>                  </span>
                                                                                                </div>

                                                                                                <div class="milestone-content">
                                                                                                    <div class="milestone-number-inner">
                                                                                                        <span class="milestone-number">3025</span>
                                                                                                    </div>
                                                                                                    <div class="milestone-text">
                                                                                                        Career Build </div>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-f022e61 elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="f022e61" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-89023a6 column-style-top" data-id="89023a6" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-878cabf elementor-widget elementor-widget-gva-heading-block" data-id="878cabf" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-center style-1 widget gsc-heading box-align-left auto-responsive">
                                                                            <div class="content-inner">


                                                                                <div class="sub-title"><span>Check Our Courses</span></div>


                                                                                <h2 class="title">
                                                                                    <span>Top Categories</span>
                                                                                </h2>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-8a480e1 elementor-widget elementor-widget-gva-course-banner-group" data-id="8a480e1" data-element_type="widget" data-widget_type="gva-course-banner-group.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-course-banner-group gva-element">
                                                                        <div class="gsc-course-banner-group layout-grid style-1">
                                                                            <div class="lg-block-grid-3 md-block-grid-3 sm-block-grid-2 xs-block-grid-1 xx-block-grid-1">

                                                                                <div class="item banner-group-item">
                                                                                    <div class="banner-item-content">

                                                                                        <div class="banner-image">
                                                                                            <img decoding="async" src="https://fmeducation.co.uk/wp-content/uploads/2021/06/cat-1.jpg" alt="SFE Courses" />
                                                                                        </div>

                                                                                        <div class="banner-content">
                                                                                            <div class="clearfix"></div>
                                                                                            <h3 class="title">SFE Courses</h3>
                                                                                        </div>

                                                                                        <a class="link-term-overlay" href="https://fmeducation.co.uk/sfe-funded-courses/"></a>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="item banner-group-item">
                                                                                    <div class="banner-item-content">

                                                                                        <div class="banner-image">
                                                                                            <img decoding="async" src="https://fmeducation.co.uk/wp-content/uploads/2021/06/cat-2.jpg" alt="Self funded Courses" />
                                                                                        </div>

                                                                                        <div class="banner-content">
                                                                                            <div class="clearfix"></div>
                                                                                            <h3 class="title">Self funded Courses</h3>
                                                                                        </div>

                                                                                        <a class="link-term-overlay" href="https://fmeducation.co.uk/self-funded/"></a>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="item banner-group-item">
                                                                                    <div class="banner-item-content">

                                                                                        <div class="banner-image">
                                                                                            <img decoding="async" src="https://fmeducation.co.uk/wp-content/uploads/2021/06/cat-3.jpg" alt="Free Courses" />
                                                                                        </div>

                                                                                        <div class="banner-content">
                                                                                            <div class="clearfix"></div>
                                                                                            <h3 class="title">Free Courses</h3>
                                                                                        </div>

                                                                                        <a class="link-term-overlay" href="https://fmeducation.co.uk/free-courses/"></a>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-2a090db bg-row-theme elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="2a090db" data-element_type="section"
                                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6ffa32a column-style-top" data-id="6ffa32a" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-11b694a elementor-widget elementor-widget-gva-heading-block" data-id="11b694a" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-left style-1 widget gsc-heading box-align-left auto-responsive">
                                                                            <div class="content-inner">




                                                                                <h2 class="title">
                                                                                    <span>Start Your Education Career with FM Education Hub</span>
                                                                                </h2>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4d3ee06 column-style-top" data-id="4d3ee06" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-3acc50c elementor-widget__width-auto elementor-widget elementor-widget-html" data-id="3acc50c" data-element_type="widget" data-widget_type="html.default">
                                                                <div class="elementor-widget-container">
                                                                    <a class="btn-white" href="https://fmeducation.co.uk/apply-now/">
    Apply Now
</a> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-5ba217a2 elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top"
                                                data-id="5ba217a2" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6c4ead4c column-style-top" data-id="6c4ead4c" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-2610af9e elementor-widget elementor-widget-gva-heading-block" data-id="2610af9e" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-left style-1 widget gsc-heading box-align-left auto-responsive">
                                                                            <div class="content-inner">


                                                                                <div class="sub-title"><span>They Trusted us</span></div>


                                                                                <h2 class="title">
                                                                                    <span>Our Happy Clients</span>
                                                                                </h2>
                                                                                <div class="title-desc">There are many text variations of passages of Lorem Ipsum available, but the majority have suffered.</div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-593db771 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="593db771" data-element_type="widget" data-widget_type="icon-list.default">
                                                                <div class="elementor-widget-container">
                                                                    <ul class="elementor-icon-list-items">
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Suspe ndisse suscipit sagittis leo.  </span>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Entum estibulum dignissim epeat.</span>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">There cursus massa at urnaaculis </span>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Lorem Ipsum is not simply random text</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-72c0a678 elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top" data-id="72c0a678" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-4a75bb13 column-style-top" data-id="4a75bb13" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-53b4831b elementor-widget__width-auto elementor-widget elementor-widget-gva-logo" data-id="53b4831b" data-element_type="widget" data-widget_type="gva-logo.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="gva-element-gva-logo gva-element">
                                                                                        <div class="gsc-logo text-left">

                                                                                            <a class="site-branding-logo" href="https://fmeducation.co.uk" title="Home" rel="Home">
        <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/07/image-14.jpg" alt="Home" />
      </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-7a8a0a4b elementor-widget__width-auto elementor-widget elementor-widget-gva-counter" data-id="7a8a0a4b" data-element_type="widget" data-widget_type="gva-counter.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="gva-element-gva-counter gva-element">
                                                                                        <div class="widget milestone-block style-2">
                                                                                            <div class="box-content">

                                                                                                <div class="milestone-content">
                                                                                                    <div class="milestone-number-inner">
                                                                                                        <span class="milestone-number">40780</span>
                                                                                                    </div>
                                                                                                    <div class="milestone-text">
                                                                                                        Projects Success </div>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1e1a8294 column-style-top" data-id="1e1a8294" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-be6cdb9 elementor-widget elementor-widget-gva-brand-hover" data-id="be6cdb9" data-element_type="widget" data-widget_type="gva-brand-hover.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-brand-hover gva-element">
                                                                        <div class="gsc-brand-hover layout-grid">
                                                                            <div class="lg-block-grid-2 md-block-grid-2 sm-block-grid-2 xs-block-grid-2 xx-block-grid-2">
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content brand-hover">
                                                                                        <span class="brand-image">
      <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-1-1.png" alt="Brand 1" class="brand-img"/>
   </span>
                                                                                        <span class="brand-image-hover">
         <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-1-2.png" alt="Brand 1" class="brand-img"/>
      </span>
                                                                                        <a href="https://gaviaspreview.com/wp/zilom/our-partner/" class="link-overlay"></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content brand-hover active">
                                                                                        <span class="brand-image">
      <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-2-1.png" alt="Brand 2" class="brand-img"/>
   </span>
                                                                                        <span class="brand-image-hover">
         <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-2-2.png" alt="Brand 2" class="brand-img"/>
      </span>
                                                                                        <a href="https://gaviaspreview.com/wp/zilom/our-partner/" class="link-overlay"></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content brand-hover">
                                                                                        <span class="brand-image">
      <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-3-1.png" alt="Brand 3" class="brand-img"/>
   </span>
                                                                                        <span class="brand-image-hover">
         <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-3-2.png" alt="Brand 3" class="brand-img"/>
      </span>
                                                                                        <a href="https://gaviaspreview.com/wp/zilom/our-partner/" class="link-overlay"></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content brand-hover">
                                                                                        <span class="brand-image">
      <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-4-1.png" alt="Brand 4" class="brand-img"/>
   </span>
                                                                                        <span class="brand-image-hover">
         <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2021/04/brand-hover-4-2.png" alt="Brand 4" class="brand-img"/>
      </span>
                                                                                        <a href="https://gaviaspreview.com/wp/zilom/our-partner/" class="link-overlay"></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-1b0fae3 elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top"
                                                data-id="1b0fae3" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f8e60d3 column-style-top" data-id="f8e60d3" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-a62ba88 elementor-widget elementor-widget-gva-heading-block" data-id="a62ba88" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-center style-1 widget gsc-heading box-align-left auto-responsive">
                                                                            <div class="content-inner">


                                                                                <div class="sub-title"><span>Our testimonials</span></div>


                                                                                <h2 class="title">
                                                                                    <span>What they saying?</span>
                                                                                </h2>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-d4218b1 dot-number elementor-widget elementor-widget-gva-testimonials" data-id="d4218b1" data-element_type="widget" data-widget_type="gva-testimonials.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-testimonials gva-element">
                                                                        <div class="gva-testimonial-carousel style-2">
                                                                            <div class="init-carousel-owl owl-carousel" data-items="3" data-items_lg="3" data-items_md="3" data-items_sm="2" data-items_xs="1" data-items_xx="1" data-loop="1" data-speed="800" data-auto_play="1" data-auto_play_speed="800" data-auto_play_timeout="6000"
                                                                                data-auto_play_hover="1" data-navigation="0" data-pagination="1" data-mouse_drag="1" data-touch_drag="1">
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                Amazing Courses </div>
                                                                                            <div class="testimonial-content">
                                                                                                I was very impresed by the kitecx service lorem ipsum is simply free text used by copy typing refreshing. Neque porro est qui dolorem ipsum. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2020/12/testimonial.png" alt="Christine Eve" />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">Christine Eve</span>
                                                                                                    <span class="testimonial-job">Founder &amp; CEO</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                Amazing Courses </div>
                                                                                            <div class="testimonial-content">
                                                                                                I was very impresed by the kitecx service lorem ipsum is simply free text used by copy typing refreshing. Neque porro est qui dolorem ipsum. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2020/12/testimonial.png" alt="Kevin Smith" />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">Kevin Smith</span>
                                                                                                    <span class="testimonial-job">Customer</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                Amazing Courses </div>
                                                                                            <div class="testimonial-content">
                                                                                                I was very impresed by the kitecx service lorem ipsum is simply free text used by copy typing refreshing. Neque porro est qui dolorem ipsum. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2020/12/testimonial.png" alt="Jessica Brown" />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">Jessica Brown</span>
                                                                                                    <span class="testimonial-job">Founder &amp; CEO</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                Amazing Courses </div>
                                                                                            <div class="testimonial-content">
                                                                                                I was very impresed by the kitecx service lorem ipsum is simply free text used by copy typing refreshing. Neque porro est qui dolorem ipsum. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="https://gaviaspreview.com/wp/zilom/wp-content/uploads/2020/12/testimonial.png" alt="David Anderson" />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">David Anderson</span>
                                                                                                    <span class="testimonial-job">Customer</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-c699a2a elementor-section-full_width row-testimonial-full elementor-section-height-default elementor-section-height-default row-top" data-id="c699a2a" data-element_type="section"
                                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-c51da38 column-style-top" data-id="c51da38" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-0bca0a1 elementor-widget elementor-widget-gva-heading-block" data-id="0bca0a1" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-left style-1 widget gsc-heading box-align-left auto-responsive">
                                                                            <div class="content-inner">


                                                                                <div class="sub-title"><span>Our Testimonials</span></div>


                                                                                <h2 class="title">
                                                                                    <span>What They’re Saying?</span>
                                                                                </h2>
                                                                                <div class="title-desc">TESTIMONIALS FROM OUR GREATEST STUDENTS</div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-cc94e00 column-style-top" data-id="cc94e00" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-10cc13a elementor-widget elementor-widget-gva-testimonials" data-id="10cc13a" data-element_type="widget" data-widget_type="gva-testimonials.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-testimonials gva-element">
                                                                        <div class="gva-testimonial-carousel style-2">
                                                                            <div class="init-carousel-owl owl-carousel" data-items="3" data-items_lg="3" data-items_md="2" data-items_sm="2" data-items_xs="1" data-items_xx="1" data-loop="1" data-speed="800" data-auto_play="1" data-auto_play_speed="800" data-auto_play_timeout="6000"
                                                                                data-auto_play_hover="1" data-navigation="0" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                Level 3 Diploma </div>
                                                                                            <div class="testimonial-content">
                                                                                                FM Education Hub guided me through my Level 3 Diploma course selection. Their support was excellent, and I am now well on my way to achieving my goals. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="{{ asset('wp-content/uploads/2024/07/Sarah.jpg') }}" alt="Sarah J." />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">Sarah J.</span>
                                                                                                    <span class="testimonial-job">Student</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                Higher Education </div>
                                                                                            <div class="testimonial-content">
                                                                                                Thanks to FM Education Hub, I successfully enrolled in the Level 4 Certification of Higher Education. Their expertise made the process smooth and straightforward. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="{{ asset('wp-content/uploads/2024/07/Megan.jpg') }}" alt="Michael B." />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">Michael B.</span>
                                                                                                    <span class="testimonial-job">Student</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                HNC/HND Success </div>
                                                                                            <div class="testimonial-content">
                                                                                                FM Education Hub helped me navigate the HNC/HND application process. I am now confidently pursuing my studies with their ongoing support. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="{{ asset('wp-content/uploads/2024/07/Liam.jpg') }}" alt="Liam D." />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">Liam D.</span>
                                                                                                    <span class="testimonial-job">Student</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item">
                                                                                    <div class="testimonial-item">
                                                                                        <div class="testimonial-item-content">
                                                                                            <div class="testimonial-title">
                                                                                                Functional Skills </div>
                                                                                            <div class="testimonial-content">
                                                                                                FM Education Hub provided excellent support for my Functional Skills course. Their team's help and personalized guidance was key to my success. </div>
                                                                                            <div class="testimonial-meta">
                                                                                                <div class="testimonial-image">
                                                                                                    <img decoding="async" src="{{ asset('wp-content/uploads/2024/07/Micheal.jpg') }}" alt="Megan T." />
                                                                                                </div>
                                                                                                <div class="testimonial-information">
                                                                                                    <span class="testimonial-name">Megan T.</span>
                                                                                                    <span class="testimonial-job">Student</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-6b9c5ac elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top"
                                                data-id="6b9c5ac" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a86d119 order-2 order-xl-1 order-lg-1 column-style-top" data-id="a86d119" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-ab3d96d elementor-widget elementor-widget-gva-heading-block" data-id="ab3d96d" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-left style-1 widget gsc-heading box-align-left auto-responsive">
                                                                            <div class="content-inner">


                                                                                <div class="sub-title"><span>Why Choose Us?</span></div>


                                                                                <h2 class="title">
                                                                                    <span>Benefits of Learning from FM Education</span>
                                                                                </h2>
                                                                                <div class="title-desc">we offer high-quality education and comprehensive consultancy services tailored to your needs. Join us for a supportive learning environment that promotes personal and professional
                                                                                    growth.</div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-0055740 elementor-position-left icon-box-left elementor-view-default elementor-mobile-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="0055740" data-element_type="widget"
                                                                data-widget_type="icon-box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-icon-box-wrapper">

                                                                        <div class="elementor-icon-box-icon">
                                                                            <span class="elementor-icon elementor-animation-">
				<i aria-hidden="true" class=" flaticon-checklist"></i>				</span>
                                                                        </div>

                                                                        <div class="elementor-icon-box-content">

                                                                            <h3 class="elementor-icon-box-title">
                                                                                <span>
							Your gateway to top-notch education and expert guidance						</span>
                                                                            </h3>


                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-2b3238f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="2b3238f" data-element_type="widget" data-widget_type="icon-list.default">
                                                                <div class="elementor-widget-container">
                                                                    <ul class="elementor-icon-list-items">
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Wide range of subjects</span>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Personalized career advice</span>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class=" flaticon-confirmation"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Support with application</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-aaf3c78 order-1 order-xl-2 order-lg-2 column-style-top" data-id="aaf3c78" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-1b5f6d6 elementor-widget elementor-widget-gva-image-content" data-id="1b5f6d6" data-element_type="widget" data-widget_type="gva-image-content.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-image-content gva-element">


                                                                        <div class="clearfix gsc-image-content skin-v2">

                                                                            <div class="image">
                                                                                <img loading="lazy" decoding="async" width="800" height="716" src="https://fmeducation.co.uk/wp-content/uploads/2021/06/image-3.jpg" class="attachment-full size-full wp-image-914" alt="" srcset="https://fmeducation.co.uk/wp-content/uploads/2021/06/image-3.jpg 800w, https://fmeducation.co.uk/wp-content/uploads/2021/06/image-3-768x687.jpg 768w"
                                                                                    sizes="(max-width: 800px) 100vw, 800px" /> </div>

                                                                            <div class="box-content">
                                                                                <h2 class="title">
                                                                                    <span>Trusted by 8800 customers</span>
                                                                                </h2>
                                                                            </div>

                                                                        </div>









                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-c32f503 elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default row-top"
                                                data-id="c32f503" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-151b02d column-style-top" data-id="151b02d" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-ae73cef elementor-widget elementor-widget-gva-heading-block" data-id="ae73cef" data-element_type="widget" data-widget_type="gva-heading-block.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-heading-block gva-element">
                                                                        <div class="align-center style-2 widget gsc-heading box-align-left auto-responsive">
                                                                            <div class="content-inner">




                                                                                <h2 class="title">
                                                                                    <span>Who Will You Learn With?</span>
                                                                                </h2>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-43aa9e6 elementor-widget elementor-widget-gva-brand" data-id="43aa9e6" data-element_type="widget" data-widget_type="gva-brand.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="gva-element-gva-brand gva-element">
                                                                        <div class="gva-brand-carousel style-1">
                                                                            <div class="init-carousel-owl owl-carousel" data-items="5" data-items_lg="5" data-items_md="4" data-items_sm="3" data-items_xs="2" data-items_xx="2" data-loop="1" data-speed="800" data-auto_play="1" data-auto_play_speed="800" data-auto_play_timeout="6000"
                                                                                data-auto_play_hover="1" data-navigation="1" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content">
                                                                                        <img decoding="async" src="https://fmeducation.co.uk/wp-content/plugins/zilom-themer/elementor/assets/images/brand.png" alt="" class="brand-img" /> </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content">
                                                                                        <img decoding="async" src="https://fmeducation.co.uk/wp-content/plugins/zilom-themer/elementor/assets/images/brand.png" alt="" class="brand-img" /> </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content">
                                                                                        <img decoding="async" src="https://fmeducation.co.uk/wp-content/plugins/zilom-themer/elementor/assets/images/brand.png" alt="" class="brand-img" /> </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content">
                                                                                        <img decoding="async" src="https://fmeducation.co.uk/wp-content/plugins/zilom-themer/elementor/assets/images/brand.png" alt="" class="brand-img" /> </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content">
                                                                                        <img decoding="async" src="https://fmeducation.co.uk/wp-content/plugins/zilom-themer/elementor/assets/images/brand.png" alt="" class="brand-img" /> </div>
                                                                                </div>
                                                                                <div class="item brand-item">
                                                                                    <div class="brand-item-content">
                                                                                        <img decoding="async" src="https://fmeducation.co.uk/wp-content/plugins/zilom-themer/elementor/assets/images/brand.png" alt="" class="brand-img" /> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                        <div class="link-pages"></div>
                                        <div class="comment-page-wrapper clearfix">
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!-- Left sidebar -->

                            <!-- Right Sidebar -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--end page content-->
@endsection

@push('scripts')
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



  {{-- optional: force‑init & set interval --}}
  <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
            0:{ items:1 },
            576:{ items:2 },
            992:{ items:3 }
            }
        });
        });
  </script>
@endpush

