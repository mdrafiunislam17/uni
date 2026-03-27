@extends('frontend.includes.app')

@section('title')
Courses Category Page
@endsection



@section('body')



 <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
            {{-- <div class="shape">
                <img src="assets/img/inner-page/shape.png" alt="img">
            </div> --}}
            <div class="container">
                <div class="page-heading">
                    <h1 class="breadcrumb-title">Courses Category</h1>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend') }}">Home</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                           Courses Category
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ===== Courses Section ===== -->
<section class="py-5 bg-light">
    <div class="container">



        <!-- Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">

    @forelse ($courses as $course)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">

                <!-- Image -->
                <img src="{{ asset('uploads/course/' . $course->image) }}"
                     class="card-img-top"
                     alt="{{ $course->title }}"
                     style="height:200px; object-fit:cover;">

                <!-- Body -->
                <div class="card-body text-center d-flex flex-column">

                    <h5 class="card-title fw-semibold">
                        {{ $course->title }}
                    </h5>

                    <div class="mt-auto">
                        <a href="{{ route('frontend.categoryes.details', $course->slug) }}"
                           class="btn btn-primary w-100">
                            View Course
                            <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <div class="alert alert-warning">
                No courses found.
            </div>
        </div>
    @endforelse

</div>

    </div>
</section>





@endsection

