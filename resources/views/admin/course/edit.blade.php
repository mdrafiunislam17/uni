@extends('admin.layouts.master')

@section('title', 'Edit Course')

@push('styles')
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Course</h1>
        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> All Courses
        </a>
    </div>

    {{-- Validation & flash messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="m-0">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    @foreach (['success','error'] as $msg)
        @if (session()->has($msg))
            <div class="alert alert-{{ $msg === 'success' ? 'success':'danger' }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session($msg) }}
            </div>
        @endif
    @endforeach

    <!-- Edit form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf  @method('PUT')

                {{-- Category --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Category</label>
                    <div class="col-sm-6">
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>


                    {{-- Title --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $course->title) }}">
                        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Slug --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Slug</label>
                    <div class="col-sm-6">
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug', $course->slug) }}" required>
                        @error('slug') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>



                {{-- Description --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>
                        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Image --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                    <div class="col-sm-6">
                        @if ($course->image)
                            <p class="mb-2">
                                <img src="{{ asset('uploads/course/' . $course->image) }}" width="120" class="img-thumbnail">
                            </p>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $course->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $course->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- TinyMCE --}}
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
