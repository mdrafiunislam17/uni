@extends('admin.layouts.master')
@section('title', 'Edit Team')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Team  – {{ $team->name }}</h1>

            <a href="{{ route('team.index') }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i> Teams List
            </a>
        </div>

        {{-- validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul class="m-0">
                    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        {{-- success / error flash --}}
        @foreach (['success', 'error'] as $flash)
            @if (session()->has($flash))
                <div class="alert alert-{{ $flash == 'success' ? 'success' : 'danger' }}">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session($flash) }}
                </div>
            @endif
        @endforeach

        <!-- Edit card -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('team.update', $team->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- === BASIC INFO === --}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $team->name) }}" autofocus>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{ old('title', $team->title) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-sm-3 col-form-label text-right font-weight-bold">Slug</label>
                        <div class="col-sm-6">
                            <input type="text" name="slug" id="slug" class="form-control"
                                   value="{{ old('slug', $team->slug) }}">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="message" class="col-sm-3 col-form-label text-right font-weight-bold">Message</label>
                        <div class="col-sm-6">
                            <input type="text" name="message" id="message" class="form-control"
                                   value="{{ old('message', $team->message) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="designation" class="col-sm-3 col-form-label text-right font-weight-bold">Designation *</label>
                        <div class="col-sm-6">
                            <input type="text" name="designation" id="designation" class="form-control"
                                   value="{{ old('designation', $team->designation) }}">
                        </div>
                    </div>

                    {{-- === SOCIAL LINKS === --}}
                    @php
                        $socials = ['facebook','twitter','linkedin','instagram','youtube'];
                    @endphp
                    @foreach ($socials as $social)
                        <div class="form-group row">
                            <label for="{{ $social }}" class="col-sm-3 col-form-label text-right font-weight-bold">{{ ucfirst($social) }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="{{ $social }}" id="{{ $social }}" class="form-control"
                                       value="{{ old($social, $team->$social) }}">
                            </div>
                        </div>
                    @endforeach

                    {{-- === CONTACT INFO === --}}
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{ old('email', $team->email) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" name="phone" id="phone" class="form-control"
                                   value="{{ old('phone', $team->phone) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label text-right font-weight-bold">Address</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" id="address" class="form-control"
                                   value="{{ old('address', $team->address) }}">
                        </div>
                    </div>

                    {{-- === IMAGE === --}}
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                        <div class="col-sm-6">
                            @if ($team->image)
                                <div class="mb-2">
                                    <img src="{{ asset('uploads/teams/' . $team->image) }}" alt="Current image" style="max-width:120px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control">
                            <small class="text-muted">Leave blank to keep existing image</small>
                        </div>
                    </div>

                    {{-- === SORT & STATUS === --}}
                    <div class="form-group row">
                        <label for="sort" class="col-sm-3 col-form-label text-right font-weight-bold">Sort</label>
                        <div class="col-sm-6">
                            <input type="number" name="sort" id="sort" class="form-control"
                                   value="{{ old('sort', $team->sort) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status', $team->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $team->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    {{-- === SUBMIT === --}}
                    <div class="form-group row">
                        <div class="offset-3 col-sm-6 d-flex align-items-center">
                            <a href="{{ route('team.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#designation',           // (আপনার ফর্ম‑এ id="message")
            height: 300,
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
        });
    </script>
@endpush
