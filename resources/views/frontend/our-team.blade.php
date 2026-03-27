@extends('frontend.includes.app')

@section('title')
Our Team Page
@endsection



@section('body')



 <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
            {{-- <div class="shape">
                <img src="assets/img/inner-page/shape.png" alt="img">
            </div> --}}
            <div class="container">
                <div class="page-heading">
                    <h1 class="breadcrumb-title">OUR TEAM</h1>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend') }}">Home</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                           OUR TEAM
                        </li>
                    </ul>
                </div>
            </div>
        </section>


         <section class="news-section section-padding fix">
            <div class="container">
                <div class="row g-4">

                 @foreach ($teams as $team)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="news-card-item">
                            <div class="news-image">
                                <img src="{{ asset('uploads/teams/' . $team->image) }}" alt="img" style="height: 380px; ">
                                {{-- <span>Student Visa</span> --}}
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image" style="background-image: url('{{ asset('uploads/teams/' . $team->image) }}'); height: 418px;"></div>
                                    <div class="news-layer-image" style="background-image: url('{{ asset('uploads/teams/' . $team->image) }}'); height: 418px;"></div>
                                    <div class="news-layer-image" style="background-image: url('{{ asset('uploads/teams/' . $team->image) }}'); height: 418px;"></div>
                                    <div class="news-layer-image" style="background-image: url('{{ asset('uploads/teams/' . $team->image) }}'); height: 418px;"></div>
                                </div>
                            </div>
                            <div class="news-content">
                                {{-- <div class="list">
                                    <span>Comment (08)</span>
                                    <span>_ 20 August ,2025</span>
                                </div> --}}
                                <h3>
                                    <a href="{{ route('frontend.team-details', $team->slug) }}">
                                        {{ $team->name }}
                                    </a>
                                </h3>
                                <div class="news-bottom">
                                    <div class="info-item">
                                        <img src="{{ asset('uploads/teams/' . $team->image) }}" alt="img" style="
                                                height: 36px;
                                                width: 36px;
                                            ">
                                        <span>{{ $team->title }}</span>
                                    </div>
                                    <a href="{{ route('frontend.team-details', $team->slug) }}" class="link-btn">View Articles<i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>
            </div>
        </section>



@endsection

