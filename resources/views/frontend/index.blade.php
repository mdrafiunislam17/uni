@extends('frontend.includes.app')

@section('title')
Home Page
@endsection

@section('body')


        <!--Hero Section Start -->
        <section class="hero-section hero-1 fix bg-cover" style="background-image: url(assets/img/home-1/hero/bg.jpg);">

            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                       <div class="swiper hero-slider">
                        <div class="swiper-wrapper">
                             @foreach($sliders as $slider)

                                <div class="swiper-slide">
                                    <div class="hero-content">

                                        <h1>
                                            {{ $slider->title }}
                                            {{-- <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup">
                                            <i class="fa-solid fa-play"></i>
                                            </a> --}}
                                        </h1>
                                        <p>
                                            {!! $slider->description !!}
                                        </p>
                                        <div class="hero-button">
                                            <a href="{{ route('frontend.apply-now') }}" class="theme-btn">
                                                Apply now
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            {{-- <a href="contact.html" class="theme-btn style-2">
                                                Book Free Consultation
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>

                             @endforeach





                        </div>
                       </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="swiper image-slider">
                            <div class="swiper-wrapper">


                            @foreach($sliders as $slider)
                                <div class="swiper-slide">
                                    <div class="hero-image">
                                        <img src="{{ asset("uploads/slider/" . $slider->image) }}" alt="img">
                                    </div>
                                </div>

                            @endforeach




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!--About Section Start -->
        <section class="about-section section-padding fix pb-0">
            {{-- <div class="top-shape">
                <img src="assets/img/home-1/about/globe.png" alt="img">
            </div> --}}
            <div class="container">
                <div class="about-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="about-image">
                                <img src="{{ asset('uploads/about/' . $about->image) }}" alt="img" class="wow img-custom-anim-left">
                                <div class="about-image-2">
                                    <img src="{{ asset('uploads/about1/' . $about->image1) }}" alt="img" class="wow img-custom-anim-right">
                                </div>
                                {{-- <div class="bg-shape">
                                    <img src="assets/img/home-1/about/Vector.png" alt="img">
                                </div>
                                <div class="plane-shape float-bob-y">
                                    <img src="assets/img/home-1/about/plane.png" alt="img">
                                </div>
                                 <div class="top-shape float-bob-y">
                                    <img src="assets/img/home-1/about/shape.png" alt="img">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title mb-0">
                                    <span class="sub-title wow fadeInUp">About Our  uni-matchglobal</span>
                                    <h2 class="split-text-right split-text-in-right">
                                        {{-- Turning Study Abroad <span>Dreams</span> Into Reality --}}
                                        {{ $about->title }}
                                    </h2>
                                </div>
                                <p class="text wow fadeInUp" data-wow-delay=".3s">
                                   {{ $about->short_description }}
                                </p>
                                {{-- <div class="about-item wow fadeInUp" data-wow-delay=".5s">
                                    <div class="content">
                                        <span><img src="assets/img/home-1/icon/01.svg" alt=""> Global Reach-</span>
                                        <p>Expanding Opportunities Worldwide</p>
                                    </div>
                                    <div class="content">
                                        <span><img src="assets/img/home-1/icon/01.svg" alt=""> Global Reach-</span>
                                        <p>Expanding Opportunities Worldwide</p>
                                    </div>
                                </div>
                                <ul class="list wow fadeInUp" data-wow-delay=".3s">
                                    <li>
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Fastest Visa form processing with skilled immigration agents
                                    </li>
                                     <li>
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Partnership with International Educational Institutions
                                    </li>
                                </ul> --}}
                                <a href="{{ route('frontend.about') }}" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
                                    Get Started
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!--Service Section Start -->
        {{-- <div class="service-section section-padding fix">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sub-title wow fadeInUp">Our Expert Services</span>
                    <h2 class="split-text-right split-text-in-right">
                        Comprehensive Visa Solutions
                    </h2>
                </div>
            </div>
             <div class="service-wrapper">
                <div class="container">
                    <div class="service-item">
                         <div class="image-hover d-none d-md-block bg-cover" style="background-image: url('assets/img/home-1/hover-bg.jpg');"></div>
                        <div class="left-item">
                            <h5 class="number">01</h5>
                            <h3>
                            <a href="service-details.html">Student Visa Guidance</a>
                            </h3>
                        </div>
                        <div class="right-item">
                            <p>
                                Assistance with admission, documentation, and visa application.Assistance
                            </p>
                            <a href="service-details.html" class="service-btn">Service Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-wrapper active">
                <div class="container">
                    <div class="service-item">
                         <div class="image-hover d-none d-md-block bg-cover" style="background-image: url('assets/img/home-1/hover-bg.jpg');"></div>
                        <div class="left-item">
                            <h5 class="number">02</h5>
                            <h3>
                            <a href="service-details.html">PTE Exam Preparation</a>
                            </h3>
                        </div>
                        <div class="right-item">
                            <p>
                               We provide expert guidance and personalized support throughout the education visa process,
                            </p>
                            <a href="service-details.html" class="service-btn">Service Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-wrapper">
                <div class="container">
                    <div class="service-item">
                         <div class="image-hover d-none d-md-block bg-cover" style="background-image: url('assets/img/home-1/hover-bg.jpg');"></div>
                        <div class="left-item">
                            <h5 class="number">03</h5>
                            <h3>
                            <a href="service-details.html">University Selection Assistance</a>
                            </h3>
                        </div>
                        <div class="right-item">
                            <p>
                                We provide expert guidance and personalized support throughout the education visa process,
                            </p>
                            <a href="service-details.html" class="service-btn">Service Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="service-wrapper">
                <div class="container">
                    <div class="service-item">
                         <div class="image-hover d-none d-md-block bg-cover" style="background-image: url('assets/img/home-1/hover-bg.jpg');"></div>
                        <div class="left-item">
                            <h5 class="number">04</h5>
                            <h3>
                            <a href="service-details.html">IELTS Exam Preparation</a>
                            </h3>
                        </div>
                        <div class="right-item">
                            <p>
                                We provide expert guidance and personalized support throughout the education visa process,
                            </p>
                            <a href="service-details.html" class="service-btn">Service Details <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <br>

        <!--Feature Section Start -->
        <section class="feature-section section-padding fix bg-cover" style="background-image: url(assets/img/home-1/feature/bg.png);">
            <div class="container">
                <div class="feature-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="feature-content">
                                <div class="section-title mb-0">
                                    <span class="sub-title bg-2 wow fadeInUp">uni-matchglobal</span>
                                    <h2 class="text-white split-text-right split-text-in-right">
                                        Visa & vISAWAY Services To uk
                                    </h2>
                                </div>
                                <p class="text wow fadeInUp" data-wow-delay=".3s">
                                    The Express Entry program is designed for skilled workers who wish to immigrate to Canada. It includes the Federal Skilled Worker Program, the Federal Skilled…
                                </p>
                                <div class="feature-list-item wow fadeInUp" data-wow-delay=".5s">
                                    <ul class="list">
                                        <li>
                                            <i class="fa-solid fa-arrow-right"></i>
                                            Visitor Visa
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-arrow-right"></i>
                                            Student Visa & Admission
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-arrow-right"></i>
                                           Work Visa – H1B
                                        </li>
                                    </ul>
                                    <ul class="list">
                                        <li>
                                            <i class="fa-solid fa-arrow-right"></i>
                                            Business Visa
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-arrow-right"></i>
                                            Work permit for Canada
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-arrow-right"></i>
                                           Student Visa for Canada
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{ route('frontend.contact') }}" class="theme-btn">
                                   Get Started
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-image">
                                <img src="{{ asset('assets/img/home-1/feature/shape.png') }}" alt="img">
                                <h6>uni-matchglobal</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--Testimonial Section Start -->
        <section class="testimonial-section section-padding pb-0 fix">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sub-title wow fadeInUp">What Our Students Say</span>
                    <h2 class="split-text-right split-text-in-right">
                        Student Reviews & Testimonials
                    </h2>
                </div>
                <div class="testimonial-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="testimonia-image tp-clip-anim p-relative">
                                <img src="{{ asset('assets/img/home-1/testimonial/01.jpg') }}" alt="img" class="tp-anim-img" data-animate="true">
                                <a href="{{ url('https://www.youtube.com/watch?v=Cn4G2lZ_g2I') }}" class="video-btn video-popup">
                                <i class="fa-solid fa-play"></i></a>
                                <h5>Real stories</h5>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="swiper testimonial-slider">
                                <div class="swiper-wrapper">

                                    @foreach ($testimonials as $testimonial)

                                      <div class="swiper-slide">
                                        <div class="testimonial-box">

                                            <p>
                                                “{{ $testimonial->message }}”
                                            </p>
                                            <div class="info-item">
                                                <div class="client-image">
                                                    <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" alt="img">
                                                </div>
                                                <div class="content">
                                                    <h5>{{ $testimonial->name }}</h5>
                                                    <span>{{ $testimonial->title }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Video Section Start -->
        <section class="video-section bg-cover">
            <video autoplay loop muted playsinline class="video-bg">
                <source src="{{ url('https://ex-coders.com/vdo/visa.mp4') }}" type="video/mp4">
            </video>
            {{-- <div class="text-image">
                <img src="assets/img/home-1/feature/text.png" alt="img">
            </div>
             <div class="text-image-2">
                <img src="assets/img/home-1/feature/text-2.png" alt="img">
            </div> --}}
            <div class="container">
                <div class="video-content">
                    <div class="shape">
                        <img src="{{ asset('assets/img/home-1/feature/Vector.png') }}" alt="img">
                    </div>
                    <h2 class="split-text-right split-text-in-right">VIDEO <br> PLAY GALLARY</h2>
                </div>
            </div>
        </section>

        <!--Faq Section Start -->
        <section class="faq-section section-padding fix">
            <div class="container">
                <div class="faq-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="faq-content">
                            <div class="section-title mb-0">
                                <span class="sub-title wow fadeInUp">Visa FAQs</span>
                                <h2 class="split-text-right split-text-in-right">
                                    Got Questions? We’ve Got Answers
                                </h2>
                            </div>
                            <p class="text">
                                We understand students often have many questions about studying abroad. Our experts provide clear.
                            </p>
                             <a href="{{ route('frontend.contact') }}" class="theme-btn">
                                contact us
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="faq-items">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".2s">
                                        <h5 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                How long does the student visa process usually take?
                                            </button>
                                        </h5>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                   Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".8s">
                                        <h5 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Do you assist with scholarship applications as well?
                                            </button>
                                        </h5>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".4s">
                                        <h5 class="accordion-header" id="headingthree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapsethree" aria-expanded="false"
                                                aria-controls="collapsethree">
                                               Will you guide me in preparing for the visa interview?
                                            </button>
                                        </h5>
                                        <div id="collapsethree" class="accordion-collapse collapse"
                                            aria-labelledby="headingthree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                   Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
                                        <h5 class="accordion-header" id="headingfour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapsefour" aria-expanded="false"
                                                aria-controls="collapsefour">
                                           Do you offer post-arrival support for students?
                                            </button>
                                        </h5>
                                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                   Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.
                                                </p>
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

        <!--Counter Section Start -->
        <section class="counter-section section-padding pb-0 fix bg-cover" style="background-image: url(assets/img/home-1/feature/bg-2.jpg);">
            <div class="shape">
                <img src="assets/img/home-1/feature/shape-2.png" alt="img">
            </div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="sub-title bg-2 wow fadeInUp">Did You Know</span>
                    <h2 class="text-white split-text-right split-text-in-right">
                       Our Achievements in Numbers
                    </h2>
                </div>
            </div>
            <div class="counter-wrapper">
                 <div class="container">
                    <div class="counter-main-item">
                        <div class="counter-item style-2">
                            <h2><span class="odometer" data-count="1">00</span>k+</h2>
                            <h5>Students Guided</h5>
                            <p>
                                Successfully assisted over a thousand students worldwide.
                            </p>
                        </div>
                        <div class="counter-item style-2">
                            <h2><span class="odometer" data-count="50">00</span>+</h2>
                            <h5>Countries Covered</h5>
                            <p>
                                Helping students apply to universities
                                in more than 50 countries.
                            </p>
                        </div>
                        <div class="counter-item style-2">
                            <h2><span class="odometer" data-count="95">00</span>%</h2>
                            <h5>Visa Success Rate</h5>
                            <p>
                               Inspired students to reach their goals globally
                            </p>
                        </div>
                        <div class="counter-item">
                            <h2><span class="odometer" data-count="10">00</span>+</h2>
                            <h5>Visa Success Rate</h5>
                            <p>
                            Trusted experts in global education consulting.
                            </p>
                        </div>
                    </div>
                 </div>
            </div>
        </section>

        <!--Visa-Consultency Section Start -->
        <section class="visa-consultency-section section-padding fix">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="visa-consultency-item">
                            <div class="image">
                                <img src="{{ asset('assets/img/home-1/feature/icon-1.png') }}" alt="img">
                            </div>
                            <h3>Best Visa Consultancy</h3>
                            <h6>{{ now()->year }}</h6>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="visa-consultency-item">
                            <div class="image">
                                <img src="{{ asset('assets/img/home-1/feature/icon-2.png') }}" alt="img">
                            </div>
                            <h3>Visa Success Award</h3>
                            <h6>{{ now()->year }}</h6>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="visa-consultency-item">
                            <div class="image">
                                <img src="{{ asset('assets/img/home-1/feature/icon-3.png') }}" alt="img">
                            </div>
                            <h3>Innovation Award</h3>
                            <h6>{{ now()->year }}</h6>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="visa-consultency-item">
                            <div class="image">
                                <img src="{{ asset('assets/img/home-1/feature/icon-4.png') }}" alt="img">
                            </div>
                            <h3>Global Education Partner</h3>
                            <h6>{{ now()->year }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Brand Section Start -->
        {{-- <div class="brand-section fix">
            <div class="container">
                 <div class="brand-wrapper style-1">
                    <div class="brand-item">
                        <div class="swiper brand-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="assets/img/home-1/brand/01.png" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="assets/img/home-1/brand/02.png" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="assets/img/home-1/brand/03.png" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="assets/img/home-1/brand/04.png" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="assets/img/home-1/brand/05.png" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div> --}}

        <!--News Section Start -->
        {{-- <section class="news-section section-padding fix">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title">
                        <span class="sub-title wow fadeInUp">Visa Tips & Guides</span>
                        <h2 class="split-text-right split-text-in-right">
                           Latest Insights & Updates
                        </h2>
                    </div>
                    <a href="news.html" class="theme-btn wow fadeInUp" data-wow-delay=".3s">
                        view all articies
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-card-item">
                            <div class="news-image">
                                <img src="assets/img/home-1/news/news-1.jpg" alt="img">
                                <span>Student Visa</span>
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-1.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-1.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-1.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-1.jpg');"></div>
                                </div>
                            </div>
                            <div class="news-content">
                                <div class="list">
                                    <span>Comment (08)</span>
                                    <span>_ 20 August ,2025</span>
                                </div>
                                <h3>
                                    <a href="news-details.html">
                                        Step-by-Step Guide to Applying for a Student Visa
                                    </a>
                                </h3>
                                <div class="news-bottom">
                                    <div class="info-item">
                                        <img src="assets/img/home-1/news/client.png" alt="img">
                                        <span>By Sohel</span>
                                    </div>
                                    <a href="news-details.html" class="link-btn">View Articles<i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="news-card-item">
                            <div class="news-image">
                                <img src="assets/img/home-1/news/news-2.jpg" alt="img">
                                <span>IELTS / TOEFL</span>
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-2.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-2.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-2.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-2.jpg');"></div>
                                </div>
                            </div>
                            <div class="news-content">
                                <div class="list">
                                    <span>Comment (08)</span>
                                    <span>_ 20 August ,2025</span>
                                </div>
                                <h3>
                                    <a href="news-details.html">
                                        Tips to Prepare Financial Documents for Visa Approval
                                    </a>
                                </h3>
                                <div class="news-bottom">
                                    <div class="info-item">
                                        <img src="assets/img/home-1/news/client.png" alt="img">
                                        <span>By Sohel</span>
                                    </div>
                                    <a href="news-details.html" class="link-btn">View Articles<i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="news-card-item">
                            <div class="news-image">
                                <img src="assets/img/home-1/news/news-3.jpg" alt="img">
                                <span>Study Abroad</span>
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-3.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-3.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-3.jpg');"></div>
                                    <div class="news-layer-image" style="background-image: url('assets/img/home-1/news/news-3.jpg');"></div>
                                </div>
                            </div>
                            <div class="news-content">
                                <div class="list">
                                    <span>Comment (08)</span>
                                    <span>_ 20 August ,2025</span>
                                </div>
                                <h3>
                                    <a href="news-details.html">
                                        Post-Arrival Guide What Every Student Should Know
                                    </a>
                                </h3>
                                <div class="news-bottom">
                                    <div class="info-item">
                                        <img src="assets/img/home-1/news/client.png" alt="img">
                                        <span>By Sohel</span>
                                    </div>
                                    <a href="news-details.html" class="link-btn">View Articles<i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

@endsection

