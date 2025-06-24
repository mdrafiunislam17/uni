@extends('frontend.includes.app')

@section('title')
Our Team Page
@endsection

@push('styles')
<!-- ✅ Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- ✅ Custom CSS -->
<style>

.breadcrumb-item::after {
  display: none !important;
}

.custom-breadcrumb .breadcrumb li {
  float: left;
  position: relative;
  z-index: 11;
  line-height: 1;
  font-weight: 700;
  padding: 0px 5px;
}

.custom-breadcrumb .breadcrumb {
  display: inline-block;
  font-size: 15px;
  font-weight: 500;
  position: absolute;
  right: 0;
  bottom: -50px;
  z-index: 9;
  padding: 25px 25px 22px;
  background: #fff;
  border-radius: 10px 10px 0 0;
}

.breadcrumb-item.active {
  color: var(--e-global-color-primary) !important;
}

.custom-heading {
  color: #001c31;
  font-size: 3.3em;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.custom-subheading {
  color: #001c31;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-size: 1.8em;
}

.dash {
  margin: 0 10px;
}

.image-wrapper {
  height: 600px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 0.5rem 0.5rem 0 0;
  position: relative;
  overflow: hidden;
  background-color: transparent; /* ব্যাকগ্রাউন্ড থাকবে না */
}


.image-wrapper img {
  height: 100%;           /* ছবির height পুরো wrapper কে ভরাট করবে */
  width: auto;            /* ছবির প্রস্থ অটো — মানে যতটুকু লাগবে */
  object-fit: cover;      /* ছবির অনুপাত ঠিক রেখে সুন্দরভাবে কাটবে */
}
/* ছবিকে সামান্য জুম‑ইন */
.card:hover .image-wrapper img{
  transform: scale(1.08);
  transition: transform .4s ease;
}
.card-body1{

  font-size: 15px;
  font-weight: 500;
  background: var( --e-global-color-primary);
  color: #fff !important;
  border-radius: 10px ;
  width: 70%;
  margin: 0 auto;
   position: relative;   /* নরমাল ফ্লো, কিন্তু সরানো যাবে */
  top: -100px;
}




</style>
@endpush

@section('body')
<div id="wp-main-content" class="clearfix main-page">

  <!-- ✅ Breadcrumb Section -->
  <div class="custom-breadcrumb text-white text-start py-5"
    style="background-image: url('https://fmeducation.co.uk/wp-content/uploads/2020/12/breadcrumb.jpg'); background-size: cover; background-position: center; position: relative;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(31,34,48, 0.1); z-index: 1;"></div>
    <div class="container position-relative" style="z-index: 2;">
      <div class="py-5">
        <h2 class="display-5 fw-bold text-white mb-3">SFE Funded Courses</h2>
        <div class="pb-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('frontend') }}" class="text-dark text-decoration-none">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">SFE Funded Courses</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
    <!-- ✅ Main Content Section -->

    <!-- SFE Funded Courses : Banner Grid -->
<section class="py-5 bg-light">
  <div class="container">

    <!-- Heading -->
    <div class="text-center mb-5">
      <span class="text-primary fw-bold small text-uppercase d-block">
        SFE Funded Courses
      </span>
      <h2 class="text-uppercase fw-semibold display-6">
        Please Select Your Desired Level Of Study
      </h2>
    </div>

    <!-- Grid -->
    <div class="row row-cols-1 row-cols-sm-2 g-4">

      <!-- Card 1 -->
    @if($courses && count($courses))
        @foreach ($courses as $course)
            <div class="col">
                <div class="card h-100 border-0 position-relative overflow-hidden bg-transparent">
                    <div class="image-wrapper">
                        <img src="{{ asset('uploads/course/' . $course->image) }}"
                            class="card-img-top img-fluid"
                            alt="{{ $course->title }}">
                    </div>
                    <div class="card-body card-body1 text-center">
                        <h3 class="h5 fw-semibold">{{ $course->title }}</h3>
                        <a href="#" class="stretched-link" aria-label="{{ $course->title }}"></a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <p class="text-muted text-center">No courses found in this category.</p>
        </div>
    @endif


      <!-- Card 2 -->


    </div><!-- /.row -->
  </div><!-- /.container -->
</section>


@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
