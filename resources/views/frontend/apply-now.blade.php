@extends('frontend.includes.app')

@section('title')
Our Team Page
@endsection

@push('styles')
<!-- ✅ Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- ✅ Custom CSS -->
<style>




</style>
@endpush

@section('body')


	<div class="wrapper-page"> <!--page-->




	 	<div id="page-content"> <!--page content-->



            <div id="wp-main-content" class="clearfix main-page">

                    <div class="custom-breadcrumb text-light text-left show-bg" style="background-image: url('https://fmeducation.co.uk/wp-content/uploads/2020/12/breadcrumb.jpg')">

                        <div class="breadcrumb-overlay" style="background-color: rgba(31,34,48, 0.1)"></div>

                        <div class="breadcrumb-main">

                            <div class="container">

                                <div class="breadcrumb-container-inner" style="padding-top:135px;padding-bottom:135px">

                                    <h2 class="heading-title">Contact</h2>
                                    <ol class="breadcrumb">
                                        <li><a href="https://fmeducation.co.uk">Home</a>
                                            </li> <li class="active">Contact</li></ol>
                                </div>
                        </div>
                        </div>
                    </div>
                    <div class="container my-5">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                            <h3 class="mb-0 text-center">Apply (UK-EU Students)</h3>
                            </div>
                            <div class="card-body">
                            {{-- <form action="{{ route('applications.store') }}" method="post" enctype="multipart/form-data">
                                @csrf --}}

                        <form action="{{ route("frontend.applyNowstore") }}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="mb-3 row">
                                <label for="course_id" class="col-sm-3 col-form-label fw-bold text-end">Course Name</label>
                                <div class="col-sm-6">
                                    <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                                    <option value="">-- Select Course Name --</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('course_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-3 row">
                                <label for="first_name" class="col-sm-3 col-form-label fw-bold text-end">First Name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" required>
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-3 row">
                                <label for="last_name" class="col-sm-3 col-form-label fw-bold text-end">Last Name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" required>
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label fw-bold text-end">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label fw-bold text-end">Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" required>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-3 row">
                                <label for="postal_address" class="col-sm-3 col-form-label fw-bold text-end">Postal Address</label>
                                <div class="col-sm-6">
                                    <input type="text" id="postal_address" name="postal_address" value="{{ old('postal_address') }}" class="form-control @error('postal_address') is-invalid @enderror" required>
                                    @error('postal_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-3 row">
                                <label for="visa_type_id" class="col-sm-3 col-form-label fw-bold text-end">Visa Status (Type)</label>
                                <div class="col-sm-6">
                                    <select name="visa_type_id" id="visa_type_id" class="form-select @error('visa_type_id') is-invalid @enderror" required>
                                    <option value="">-- Select Visa Status --</option>
                                    @foreach($visaTypes as $visaType)
                                        <option value="{{ $visaType->id }}" {{ old('visa_type_id') == $visaType->id ? 'selected' : '' }}>
                                        {{ $visaType->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('visa_type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-3 row">
                                <label for="referrer_name" class="col-sm-3 col-form-label fw-bold text-end">Referrer Name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="referrer_name" name="referrer_name" value="{{ old('referrer_name') }}" class="form-control @error('referrer_name') is-invalid @enderror">
                                    @error('referrer_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="mb-4 row">
                                <label for="referrer_phone" class="col-sm-3 col-form-label fw-bold text-end">Referrer Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" id="referrer_phone" name="referrer_phone" value="{{ old('referrer_phone') }}" class="form-control @error('referrer_phone') is-invalid @enderror">
                                    @error('referrer_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                                </div>
                                </div>

                        </form>
                            </div>
                        </div>
                    </div>



@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Bootstrap validation script
(() => {
  'use strict';
  const forms = document.querySelectorAll('form');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>
@endpush
