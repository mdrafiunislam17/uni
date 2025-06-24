@extends("admin.layouts.master")
@section("title", "Create about")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create about</h1>
            <a href="{{ route("about.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> abouts</a>
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
                <form action="{{ route("about.store") }}" method="post" enctype="multipart/form-data">
                    @csrf




                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ old("title") }}"
                                   name="title">
                            @error("title")
                            <div class="text-danger">{{ $message }}</div>

                            @enderror
                        </div>
                    </div>
                    {{-- Subtitle --}}
                    <div class="form-group row">
                        <label for="subtitle" class="col-sm-3 col-form-label text-right font-weight-bold">Subtitle</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subtitle" value="{{ old("subtitle") }}"
                                   name="subtitle">
                            @error("subtitle")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                     <div class="form-group row">
                        <label for="short_description"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Short Description</label>
                        <div class="col-sm-6">
                            <textarea name="short_description" id="short_description" class="form-control">{{ old("short_description") }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="description"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Description *</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control">{{ old("description") }}</textarea>
                        </div>
                    </div>





                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Image *</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image1"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Image 1</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image1" name="image1">
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div> --}}

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
