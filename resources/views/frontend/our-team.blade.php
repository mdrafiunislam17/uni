@extends('frontend.includes.app')

@section('title')
Our Team Page
@endsection

@push('styles')


<!-- ✅ Optional: Bootstrap CDN -->
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


/* make sure the parent card (or wrapper) is position:relative; */
.card {
  position: relative;
}

.card-body1 {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 28px;
  padding: 15px 10px;
  background: #fff;
  border-radius: 10px 10px 0 0;
  z-index: 9;
  text-align: center;
  width: 50%;
}

.card-text {
  font-size: 16px;
  font-weight: 500;
  color: var(--e-global-color-primary);
}



.team-section h2 {
    font-weight: bold;
    font-size: 2.5rem;
  }
  .team-section h3.custom-subheading {
    font-size: 1.25rem;
    color: #555;
  }
  .team-card {
    border: none;
    background-color: #fff;
    transition: transform 0.3s ease;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
  }
  .team-card:hover {
    transform: translateY(-5px);
  }
  .team-card img {
    height: 250px;
    object-fit: cover;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }
  .team-card .card-body {
    padding: 1rem;
  }
  .team-card .card-title {
    font-size: 1.1rem;
    margin-bottom: 0.25rem;
  }
  .team-card .card-text {
    font-size: 0.95rem;
    color: #6c757d;
  }



  .role-text p {
  font-size: 16px;
  color: var(--e-global-color-primary);
  font-weight: 500;
}



</style>
@endpush




@section('body')

<div id="wp-main-content" class="clearfix main-page">

    <div class="custom-breadcrumb text-white text-start py-5" style="background-image: url('https://fmeducation.co.uk/wp-content/uploads/2020/12/breadcrumb.jpg'); background-size: cover; background-position: center; position: relative;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(31,34,48, 0.1); z-index: 1;"></div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="py-5">
                <h2 class="display-5 fw-bold text-white mb-3">Our Team</h2>


                <div class="pb-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('frontend') }}" class="text-dark text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active " aria-current="page">Our Team</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


<section class="container my-5">
  <div class="row">
    <!-- Full width main heading -->
    <div class="col-12 text-center mb-4">
      <h2 class="custom-heading">Team Members</h2>
    </div>
  </div>

<div class="row justify-content-center">
  <div class="col-md-4 text-center">
    <h3 class="custom-subheading"><span class="dash">-</span> Meet our team <span class="dash">-</span></h3>
  </div>
</div>


<div class="row row-cols-1 row-cols-md-3 g-4">

    @foreach ($teams as $team)


    <div class="col">
    <div class="card border-0 shadow-0 bg-transparent text-center h-100 position-relative">
        <img src="{{ asset('uploads/teams/' . $team->image) }}"
            class="card-img-top"
            alt="...">

        <!-- Name overlay -->
        <div class="card-body card-body1">
        <h5 class="card-title mb-1 fw-bold text-dark">{{ $team->name }}</h5>
        </div>

        <!-- Role below the card -->
            <div class="role-text mt-3">
            <p class="m-0">{{ $team->title }}</p>
            </div>

    </div>
    </div>

    @endforeach


</div>















</div>
</section>



 @endsection

@push('scripts')
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



  {{-- optional: force‑init & set interval --}}
  <script>

  </script>
@endpush

