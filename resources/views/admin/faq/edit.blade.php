@extends("admin.layouts.master")
@section("title", "Edit Faq")

@section("content")
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit FAQ</h1>
        <a href="{{ route("faq.index") }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> All FAQs
        </a>
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

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('faq.update', $faq->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="question" class="col-sm-3 col-form-label text-right font-weight-bold">Question *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="question" name="question"
                               value="{{ old('question', $faq->question) }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="answer" class="col-sm-3 col-form-label text-right font-weight-bold">Answer *</label>
                    <div class="col-sm-6">
                        <textarea name="answer" id="answer" class="form-control" rows="5">{{ old('answer', $faq->answer) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sort" class="col-sm-3 col-form-label text-right font-weight-bold">Sort</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="sort" name="sort"
                               value="{{ old('sort', $faq->sort) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', $faq->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $faq->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Update FAQ</button>
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
        selector: '#answer',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
        menubar: false,
    });
</script>
@endpush
