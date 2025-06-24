@extends("admin.layouts.master")
@section("title", "Edit About")
@section("content")
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit About</h1>
        <a href="{{ route("about.index") }}"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> All Abouts
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session("success"))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session("success") }}
        </div>
    @endif

    <!-- Edit Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <!-- Title -->
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title</label>
                    <div class="col-sm-6">
                        <input type="text" name="title" id="title" value="{{ old('title', $about->title) }}"
                               class="form-control">
                        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Subtitle -->
                <div class="form-group row">
                    <label for="subtitle" class="col-sm-3 col-form-label text-right font-weight-bold">Subtitle</label>
                    <div class="col-sm-6">
                        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $about->subtitle) }}"
                               class="form-control">
                        @error('subtitle') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="short_description" class="col-sm-3 col-form-label text-right font-weight-bold">Short Description</label>
                    <div class="col-sm-6">
                        <textarea name="short_description" id="short_description" class="form-control">{{ old('short_description', $about->short_description) }}</textarea>
                        @error('short_description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description" class="form-control">{{ old('description', $about->description) }}</textarea>
                    </div>
                </div>

                <!-- Image -->
                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                    <div class="col-sm-6">
                        <input type="file" name="image" id="image" class="form-control">
                        @if($about->image)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/about/' . $about->image) }}" width="100" alt="Current Image">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Image 1 -->
                <div class="form-group row">
                    <label for="image1" class="col-sm-3 col-form-label text-right font-weight-bold">Image 1</label>
                    <div class="col-sm-6">
                        <input type="file" name="image1" id="image1" class="form-control">
                        @if($about->image1)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/about1/' . $about->image1) }}" width="100" alt="Current Image 1">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Status -->
                {{-- <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', $about->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $about->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div> --}}

                <!-- Submit -->
                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">Update</button>
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
        selector: '#description',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
        menubar: false,
    });
</script>
@endpush
