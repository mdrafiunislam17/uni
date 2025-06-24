@extends("admin.layouts.master")
@section("title", "Create Applications")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Applications</h1>
            <a href="{{ route("applications.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Applications</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has("success"))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("success") }}
            </div>
        @endif

        @if (session()->has("error"))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("error") }}
            </div>
    @endif

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route("applications.store") }}" method="post" enctype="multipart/form-data">
                    @csrf

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Course Name</label>
                    <div class="col-sm-6">
                        <select name="course_id" class="form-control @error('course_id') is-invalid @enderror" required>
                            <option value="">-- Select Course Name --</option>
                           @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach

                        </select>
                        @error('course_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                    <div class="form-group row">
                        <label for="first_name" class="col-sm-3 col-form-label text-right font-weight-bold">First Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="first_name" value="{{ old("first_name") }}"
                                   name="first_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-sm-3 col-form-label text-right font-weight-bold">Last Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="last_name" value="{{ old("last_name") }}"
                                   name="last_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" value="{{ old("email") }}"
                                   name="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" value="{{ old("phone") }}"
                                   name="phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="postal_address" class="col-sm-3 col-form-label text-right font-weight-bold">Postal Address</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="postal_address" value="{{ old("postal_address") }}"
                                   name="postal_address">
                        </div>
                    </div>

                     <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Visa Status (Type) </label>
                    <div class="col-sm-6">
                        <select name="visa_type_id" class="form-control @error('visa_type_id') is-invalid @enderror" required>
                            <option value="">-- Select Visa Status --</option>
                            @foreach($visaTypes as $visaType)
                                <option value="{{ $visaType->id }}" {{ old('visa_type_id') == $visaType->id ? 'selected' : '' }}>
                                    {{ $visaType->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('visa_type_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                    <div class="form-group row">
                        <label for="'referrer_name" class="col-sm-3 col-form-label text-right font-weight-bold">Referrer Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="referrer_name" value="{{ old("referrer_name") }}"
                                   name="referrer_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="'referrer_phone" class="col-sm-3 col-form-label text-right font-weight-bold">Referrer Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="referrer_phone" value="{{ old("referrer_phone") }}"
                                   name="referrer_phone">
                        </div>
                    </div>





                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#description',  // Use textarea as the editor
            height: 300,           // Set the height of the editor
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
        });
    </script>

@endpush
