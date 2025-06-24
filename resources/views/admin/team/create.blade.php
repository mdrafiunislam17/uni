@extends("admin.layouts.master")
@section("title", "Create Teams")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Teams</h1>
            <a href="{{ route("team.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Teamss</a>
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
                <form action="{{ route("team.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" value="{{ old("name") }}"
                                   name="name" autofocus>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" value="{{ old("title") }}"
                                   name="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-sm-3 col-form-label text-right font-weight-bold">Slug *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="slug" value="{{ old("slug") }}"
                                   name="slug">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="message"
                                class="col-sm-3 col-form-label text-right font-weight-bold">Message</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="message" value="{{ old("message") }}"
                                   name="message">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="designation"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Designation *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="designation" value="{{ old("designation") }}"
                                   name="designation">
                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="facebook"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Facebook</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="facebook" value="{{ old("facebook") }}"
                                   name="facebook">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="twitter"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Twitter</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="twitter" value="{{ old("twitter") }}"
                                   name="twitter">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="linkedin"
                               class="col-sm-3 col-form-label text-right font-weight-bold">LinkedIn</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="linkedin" value="{{ old("linkedin") }}"
                                   name="linkedin">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="instagram"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Instagram</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="instagram" value="{{ old("instagram") }}"
                                   name="instagram">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="youtube"
                               class="col-sm-3 col-form-label text-right font-weight-bold">YouTube</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="youtube" value="{{ old("youtube") }}"
                                   name="youtube">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" value="{{ old("email") }}"
                                   name="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" value="{{ old("phone") }}"
                                   name="phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Address</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" value="{{ old("address") }}"
                                   name="address">
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
                        <label for="sort"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Sort</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="sort" value="{{ old("sort") }}"
                                   name="sort">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
