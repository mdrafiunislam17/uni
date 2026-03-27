@extends('frontend.includes.app')

@section('title')
Team Details Page
@endsection

@section('body')

<section class="breadcrumb-wrapper fix bg-cover"
    style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">TEAM DETAILS</h1>
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ route('frontend') }}">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('frontend.our-team') }}">Our Team</a>
                </li>
                <li>
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li>{{ $team->name }}</li>
            </ul>
        </div>
    </div>
</section>

<section class="team-details-section section-padding fix">
    <div class="container">
        <div class="team-details-wrapper">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay=".2s">
                    <div class="team-details-image">
                        <img src="{{ asset('uploads/teams/' . $team->image) }}" alt="{{ $team->name }}">
                    </div>
                </div>

                <div class="col-lg-7 wow fadeInUp" data-wow-delay=".4s">
                    <div class="team-details-content">
                        {{-- <span class="team-subtitle">{{ $team->title }}</span> --}}
                        <h2>{{ $team->name }}</h2>

                        @if(!empty($team->message))
                            <p class="mb-3">
                                {{ $team->message }}
                            </p>
                        @endif

                        @if(!empty($team->designation))
                            <div class="team-designation mb-4">
                                {!! $team->designation !!}
                            </div>
                        @endif

                        <div class="team-contact-info">
                            @if(!empty($team->email))
                                <div class="info-item">
                                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                                    <div class="content">
                                        <span>Email Address</span>
                                        <h6>
                                            <a href="mailto:{{ $team->email }}">{{ $team->email }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($team->phone))
                                <div class="info-item">
                                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                                    <div class="content">
                                        <span>Phone Number</span>
                                        <h6>
                                            <a href="tel:{{ $team->phone }}">{{ $team->phone }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($team->address))
                                <div class="info-item">
                                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                                    <div class="content">
                                        <span>Address</span>
                                        <h6>{{ $team->address }}</h6>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="team-social-links mt-4">
                            @if(!empty($team->facebook))
                                <a href="{{ $team->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif

                            @if(!empty($team->twitter))
                                <a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif

                            @if(!empty($team->linkedIn))
                                <a href="{{ $team->linkedIn }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif

                            @if(!empty($team->instagram))
                                <a href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif

                            @if(!empty($team->youtube))
                                <a href="{{ $team->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .team-details-image img {
        width: 100%;
        border-radius: 16px;
        object-fit: cover;
        box-shadow: 0 15px 40px rgba(0,0,0,0.10);
    }

    .team-details-content .team-subtitle {
        display: inline-block;
        font-size: 16px;
        color: #0d6efd;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .team-details-content h2 {
        font-size: 42px;
        margin-bottom: 18px;
    }

    .team-details-content p {
        font-size: 16px;
        color: #666;
        line-height: 1.8;
    }

    .team-designation {
        background: #f8f9fa;
        padding: 18px 20px;
        border-radius: 12px;
        border-left: 4px solid #0d6efd;
    }

    .team-contact-info {
        margin-top: 30px;
    }

    .team-contact-info .info-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
        padding: 16px 18px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 12px;
    }

    .team-contact-info .icon {
        width: 50px;
        height: 50px;
        min-width: 50px;
        line-height: 50px;
        text-align: center;
        border-radius: 50%;
        background: #0d6efd;
        color: #fff;
        font-size: 18px;
    }

    .team-contact-info .content span {
        display: block;
        color: #888;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .team-contact-info .content h6 {
        margin: 0;
        font-size: 17px;
    }

    .team-contact-info .content h6 a {
        color: #111;
        text-decoration: none;
    }

    .team-social-links {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .team-social-links a {
        width: 45px;
        height: 45px;
        line-height: 45px;
        text-align: center;
        border-radius: 50%;
        background: #f1f5f9;
        color: #111;
        transition: 0.3s;
        font-size: 18px;
    }

    .team-social-links a:hover {
        background: #0d6efd;
        color: #fff;
    }
</style>

@endsection
