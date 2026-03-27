@extends('frontend.includes.app')

@section('title')
    {{ $course->title }}
@endsection

@section('body')

    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
        <div class="container">
            <div class="page-heading">
                <h1 class="breadcrumb-title">{{ $course->title }}</h1>
                <ul class="breadcrumb-list">
                    <li>
                        <a href="{{ route('frontend') }}">Home</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Courses Category</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        {{ $course->title }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('uploads/course/' . $course->image) }}"
                             class="card-img-top img-fluid"
                             alt="{{ $course->title }}">

                        <div class="card-body p-4">
                            <h2 class="fw-bold mb-3">{{ $course->title }}</h2>

                            @if($course->category)
                                <p class="mb-3">
                                    <span class="badge bg-primary">
                                        {{ $course->category->name }}
                                    </span>
                                </p>
                            @endif

                            <h5 class="mb-3">Course Description</h5>

                            <div class="text-muted lh-lg">
                                {!! $course->description !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Course Info</h4>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <span>Title</span>
                                    <span class="fw-semibold text-end">{{ $course->title }}</span>
                                </li>

                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <span>Status</span>
                                    <span class="fw-semibold">
                                        {{ $course->status == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </li>

                                @if($course->category)
                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span>Category</span>
                                        <span class="fw-semibold">{{ $course->category->name }}</span>
                                    </li>
                                @endif
                            </ul>

                            <div class="mt-4">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-primary w-100">
                                    <i class="fa-solid fa-arrow-left me-2"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>

                    @if($coursesCategory->count())
                        <div class="card border-0 shadow-sm mt-4">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-3">All Categories</h4>

                                <ul class="list-group list-group-flush">
                                    @foreach($coursesCategory as $category)
                                        <li class="list-group-item px-0">
                                            {{ $category->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection
