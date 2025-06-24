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

/* FAQ Section Styling */
.faq-section {
  background-color: #f8f9fa;
  border-radius: 16px;
  padding: 3rem 2rem;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.faq-section h2 {
  color: var(--e-global-color-primary) !important;
  font-weight: 700;
  margin-bottom: 2rem;
  text-align: center;
  position: relative;
}

/* .faq-section h2::after {
  content: '';
  width: 60px;
  height: 4px;
  background-color: var(--e-global-color-primary);
  display: block;
  margin: 10px auto 0;
  border-radius: 2px;
} */

/* Accordion Styling (ICON ON THE RIGHT) */
.accordion-button {
  position: relative; /* এটা অবশ্যই থাকবে */
  color: #fff !important;
  background-color: var(--e-global-color-primary) !important;
}

.accordion-button::after {
    padding-bottom: 5px;
    content: '+' !important;
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translateY(-50%);
    width: 2rem !important;
    height: 2rem !important;
    display: flex
;
    align-items: center;
    justify-content: center;
    border-radius: 50px;
    background-color: #fff !important;
    border: 1px solid var(--e-global-color-primary) !important;
    color: var(--e-global-color-primary) !important;
    background-image: none !important;
    font-size: 1.5rem;
    line-height: 3;
    box-sizing: border-box;
    font-weight: bold;
    transition: transform 0.3s ease-in-out !important;
    flex-direction: column-reverse;
    flex-wrap: wrap;
    align-content: space-around;
}






.accordion-button:not(.collapsed)::after {
  content: '−' !important;  /* এইটা মাইনাস সাইন Unicode U+2212 */
  position: absolute;
  top: 50%;
  right: 1rem;
  transform: translateY(-50%) !important;
  width: 2rem !important;
  height: 2rem !important;

  display: flex;
  align-items: center;
  justify-content: center;

  border-radius: 50% !important;
  background-color: #fff !important;
  border: 1px solid var(--e-global-color-primary) !important;
  color: var(--e-global-color-primary) !important;

  background-image: none !important;
  font-size: 1.5rem;
  line-height: 1;
  box-sizing: border-box;
  font-weight: bold;
  transition: transform 0.3s ease-in-out !important;
}


.accordion-button::before {
  content: none;
}

.accordion-body {
  background-color: #ffffff;
  padding: 1rem 1.5rem;
  border-top: 1px solid #dee2e6;
  font-size: 1rem;
  color: #495057;
}

.accordion-item , .accordion-header{
  border: none;
  margin-bottom: 1rem;
  border-radius: 12px;
  overflow: hidden;
  background: var(--e-global-color-primary) !important;
  transition: all 0.3s ease-in-out;
}

/* -------------------------------------------------
   MOBILE TWEAKS  (≤767.98 px)
------------------------------------------------- */
@media (max-width: 767.98px) {

  /* ---------- Breadcrumb ---------- */
  .custom-breadcrumb .breadcrumb {
    /* ডিবাগে absolute → static করলে সহজে ভাঙবে না  */
    position: static;
    display: block;
    margin: 0 auto 1rem;     /* ওপরের/নিচের স্পেস */
    padding: 12px 16px 10px; /* কম প্যাডিং */
    text-align: center;
    font-size: 13px;
  }
  .custom-breadcrumb .breadcrumb li {
    float: none;             /* এক লাইনে না ঠেলে ব্রেক হতে দাও */
    display: inline-block;   /* still inline */
    padding: 0 3px;
  }

  /* ---------- Headings ---------- */
  .custom-heading   { font-size: 2rem; letter-spacing: 1px; }
  .custom-subheading{ font-size: 1.25rem; letter-spacing: .8px; }

  /* ---------- FAQ wrapper ---------- */
  .faq-section{
    padding: 2rem 1rem;      /* ফোনে কম প্যাডিং */
    border-radius: 12px;
  }
  .faq-section h2{
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
  }

  /* ---------- Accordion items ---------- */
  .accordion-item,
  .accordion-header{
    margin-bottom: .75rem;
    border-radius: 10px;
  }

  /* Accordion toggle button (collapsed & expanded) */
  .accordion-button{
    font-size: .9rem;          /* প্রশ্নের ফন্ট ছোট */
    padding-right: 3rem;       /* যাতে আইকনের জন্য জায়গা থাকে  */
  }

  /* আইকনের আকার ছোট – Collapsed (+) */
  .accordion-button.collapsed::after{
    width: 1.6rem !important;
    height: 1.6rem !important;
    font-size: 1.2rem;
    line-height: 1;            /* flex‑centric হওয়ায় ১ যথেষ্ট  */
  }

  /* Expanded (−) আইকনটাও একই আকার রাখো  */
  .accordion-button:not(.collapsed)::after{
    width: 1.6rem !important;
    height: 1.6rem !important;
    font-size: 1.2rem;
    line-height: 1;
  }

  /* Accordion body প্যাডিং কমাও */
  .accordion-body{
    padding: .85rem 1rem;
    font-size: .95rem;
  }
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
        <h2 class="display-5 fw-bold text-white mb-3">FAQ</h2>
        <div class="pb-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('frontend') }}" class="text-dark text-decoration-none">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- ✅ FAQ Section -->
  <section class="container py-5 faq-section">
    <h2>Frequently Asked Questions</h2>
    <div class="row">
      <!-- Left Column -->
        @php
        $chunks = $faqs->chunk(ceil($faqs->count() / 2));
        @endphp

        <div class="row">
        @foreach ($chunks as $chunkIndex => $chunk)
            <div class="col-md-6">
            <div class="accordion" id="faqAccordion{{ $chunkIndex }}">
                @foreach ($chunk as $index => $faq)
                @php
                    $uniqueId = $chunkIndex . '-' . $index;
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq-heading-{{ $uniqueId }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $uniqueId }}"
                        aria-expanded="false" aria-controls="faq-{{ $uniqueId }}">
                        {{ $faq->question }}
                    </button>
                    </h2>
                    <div id="faq-{{ $uniqueId }}" class="accordion-collapse collapse" aria-labelledby="faq-heading-{{ $uniqueId }}" data-bs-parent="#faqAccordion{{ $chunkIndex }}">
                    <div class="accordion-body">
                        {!! $faq->answer !!}
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        @endforeach
        </div>


      <!-- Right Column -->

    </div>
  </section>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
