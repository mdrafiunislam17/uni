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



.icon-wrapper {
  width: 60px;
  height: 60px;
  border-radius: 50% !important;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.08) !important;
  font-size: 1.5rem;
  flex-shrink: 0;
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
        <h2 class="display-5 fw-bold text-white mb-3">Contact</h2>
        <div class="pb-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('frontend') }}" class="text-dark text-decoration-none">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
    <!-- ✅ Main Content Section -->

<section class="container py-5">
  <div class="row g-4 text-center text-lg-start">

    <!-- Phone -->
    <div class="col-lg-4 col-md-6">
      <div class="contact-card h-100 shadow-sm border rounded p-4">
        <div class="d-flex align-items-center gap-3">
          <div class="icon-wrapper">
            <i class="flaticon-chat"></i>
          </div>
          <div class="text-start">
            <h5 class="mb-1 fw-semibold">
              <a href="tel:+447951072254" class="text-dark text-decoration-none">+447951072254</a>
            </h5>
            <p class="text-muted mb-0">Call Anytime</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Email -->
    <div class="col-lg-4 col-md-6">
      <div class="contact-card h-100 shadow-sm border rounded p-4">
        <div class="d-flex align-items-center gap-3">
          <div class="icon-wrapper">
            <i class="flaticon-message"></i>
          </div>
          <div class="text-start">
            <h5 class="mb-1 fw-semibold">
              <a href="mailto:info@fmeducation.co.uk" class="text-dark text-decoration-none">info@fmeducation.co.uk</a>
            </h5>
            <p class="text-muted mb-0">Send Email</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Address -->
    <div class="col-lg-4 col-md-12">
      <div class="contact-card h-100 shadow-sm border rounded p-4">
        <div class="d-flex align-items-center gap-3">
          <div class="icon-wrapper">
            <i class="flaticon-address"></i>
          </div>
          <div class="text-start">
            <h5 class="mb-1 fw-semibold">
              Suite 01, The Clock House, 4th Floor Barking, IG11 8EQ
            </h5>
            <p class="text-muted mb-0">Address</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-start">

      <!-- Left Column : Heading + Social -->
      <div class="col-lg-6">
        <small class="text-primary fw-semibold d-block mb-2 text-uppercase">Send a Message</small>

        <h2 class="fw-bold display-6 mb-3 text-uppercase">
          We Always Ready to Hear From You
        </h2>

        <p class="mb-4 fs-5">
          If you have any query, please fill out this form. One of our consultants will contact you.
        </p>

        <!-- Social Icons -->
        <div class="d-flex gap-3">
          <a href="https://www.facebook.com/fmeducationhub/" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center"
             style="width: 48px; height: 48px;" target="_blank" aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://www.instagram.com/your_instagram_handle" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center"
             style="width: 48px; height: 48px;" target="_blank" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>

      <!-- Right Column : Contact Form -->
        <div class="col-lg-6">
        <div class="bg-white p-4 rounded-4 shadow-sm">
            <form class="needs-validation" novalidate>
            <div class="mb-3">
                <label class="form-label" for="contactName">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="contactName" required>
                <div class="invalid-feedback">Please enter your name.</div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="contactEmail">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="contactEmail" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="contactMsg">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" id="contactMsg" rows="4" required></textarea>
                <div class="invalid-feedback">Write a message please.</div>
            </div>

            <button type="submit" class="btn w-auto px-5 py-2" style="background-color: var(--e-global-color-primary); border-color: var(--e-global-color-primary); color: #fff;">
                Submit
            </button>


            </form>
        </div>
        </div>


    </div>
  </div>
</section>




@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
