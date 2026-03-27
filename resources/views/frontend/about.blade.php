@extends('frontend.includes.app')

@section('title')
About Page
@endsection




@section('body')

 <!-- Breadcrumb-Wrapper Section Start -->
        <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
            {{-- <div class="shape">
                <img src="assets/img/inner-page/shape.png" alt="img">
            </div> --}}
            <div class="container">
                <div class="page-heading">
                    <h1 class="breadcrumb-title">About Us</h1>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend') }}">Home</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                           About Us
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!--Choose-us Section3 Start -->
        <section class="intro-section section-padding fix pb-0">
            <div class="container">

                {{-- <span class="sub-title-2 wow fadeInUp">uni-matchglobal</span> --}}

                 <div class="row">
                    <div class="intro-image tp-clip-anim p-relative">
                        <img src="{{ asset('uploads/about/' . $about->image) }}" alt="img" class="tp-anim-img" data-animate="true">
                    </div>
                </div>

                <div class="section-title-area">
                    <div class="section-title">
                        <br>

                    <h2 class="split-text-right split-text-in-right">
                            {{ $about->title }}
                    </h2>
                </div>
                <p>
                     {{ $about->short_description }}
                </p>
                </div>

            </div>
        </section>


         <section class="intro-section section-padding fix pb-0">
            <div class="container">


                <p>
                     {!! $about->description !!}
                </p>
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
 <br>

@endsection
