@extends('frontend.includes.app')

@section('title')
Appointment Page
@endsection



@section('body')



 <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
            {{-- <div class="shape">
                <img src="assets/img/inner-page/shape.png" alt="img">
            </div> --}}
            <div class="container">
                <div class="page-heading">
                    <h1 class="breadcrumb-title">Appointment</h1>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend') }}">Home</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                           Appointment
                        </li>
                    </ul>
                </div>
            </div>
        </section>

           <!--Appointment Section Start -->
        <section class="appointment-section section-padding fix">
            <div class="container">
                <div class="appointment-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="appointment-content">
                                <div class="section-title mb-0">
                                    <span class="sub-title-2">About Our Consultancy</span>
                                    <h2 class="split-text-right split-text-in-right">
                                        Want to meet us for your need?
                                    </h2>
                                </div>
                                <h5>
                                    Have any questions?
                                </h5>
                                <p>
                                    24/7 customer support is always ready to answer all your questions
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="calendar">
                                <div class="calendar-header">
                                <h2 id="month-year"></h2>
                                <div>
                                    <button id="prev">&lt;</button>
                                    <button id="next">&gt;</button>
                                </div>
                                </div>
                                <div class="days">
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                                <div>Sun</div>
                                </div>
                                <div class="dates" id="dates"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Contact Section Start -->
        <div class="contact-section section-padding fix pt-0">
            <div class="container">
                <div class="contact-from-wrapper">
                    <div class="row g-4">
                        <div class="col-xl-12">
                             <form action="{{ route("frontend.applyNowstore") }}" method="post" enctype="multipart/form-data" id="contact-form1" class="contact-form-items">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <div class="form-clt">
                                            <span>First Name</span>
                                            <input type="text" name="first_name" id="name331" placeholder="Your first_name">
                                        </div>
                                    </div>

                                     <div class="col-lg-4">
                                        <div class="form-clt">
                                            <span>Last Name</span>
                                            <input type="text" name="last_name" id="name331" placeholder="Your last_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-clt">
                                            <span>Your Email</span>
                                            <input type="text" name="email" id="email11" placeholder="Your email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-clt">
                                            <span>Your Phone</span>
                                            <input type="text" name="phone" id="name22" placeholder="Phone Number">
                                        </div>
                                    </div>


                                        <div class="col-lg-4">
                                        <div class="form-clt">
                                            <span>referrer_name</span>
                                            <input type="text" name="referrer_name" id="name22" placeholder="Referrer Name">
                                        </div>
                                    </div>


                                     <div class="col-lg-4">
                                        <div class="form-clt">
                                            <span>referrer_phone</span>
                                            <input type="text" name="referrer_phone" id="name22" placeholder="Referrer Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Your Address</span>
                                            <input type="text" name="postal_address" id="name24" placeholder="Your postal address">
                                        </div>
                                    </div>
                                      <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Course Name</span>
                                            <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                                                <option value="">-- Select Course Name --</option>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                                        {{ $course->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Visa Type</span>
                                            <select name="visa_type_id" id="visa_type_id" class="form-select @error('visa_type_id') is-invalid @enderror" required>
                                                <option value="">-- Select Visa Type --</option>
                                                @foreach($visaTypes as $visaType)
                                                    <option value="{{ $visaType->id }}" {{ old('visa_type_id') == $visaType->id ? 'selected' : '' }}>
                                                        {{ $visaType->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                      <div class="col-lg-6">
                                        <div class="form-clt">
                                             <button type="submit" class="theme-btn">
                               Request Appointment
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                                        </div>
                                    </div>

                               </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection
