@extends("admin.layouts.master")
@section("title", "Sliders")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sliders</h1>
            <a href="{{ route("sliders.create") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create Sliders</a>
        </div>

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

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>Sort</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Status</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $slider->sort }}</td>
                                <td><img src="{{ asset("uploads/slider/$slider->image") }}" width="100" alt=""></td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle }}</td>
                                <td>
                                    @if ($slider->status == 1)
                                        <span class="badge badge-success badge-counter">Active</span>
                                    @else
                                        <span class="badge badge-danger badge-counter">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <a href="{{ route("sliders.show", $slider->id) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a> --}}
                                    <a href="{{ route("sliders.edit", $slider->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                 <form action="{{ route('sliders.destroy', $slider->id) }}" method="post" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            class="btn btn-sm btn-danger delete-btn"
                                            data-url="{{ route('sliders.destroy', $slider->id) }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>




<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmLabel">Confirm Delete</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>




@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 5 JS bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>



$(document).ready(function() {
    let deleteUrl = '';
    let deleteForm = null; // ফর্ম ধরে রাখার জন্য

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));

    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        deleteUrl = $(this).data('url');
        deleteForm = $(this).closest('form'); // ফর্ম ধরে রাখা
        deleteModal.show();
    });

    // Confirm delete from modal
    $('#confirmDeleteBtn').click(function () {
        if (deleteForm) {
            deleteForm.submit(); // ফর্ম সাবমিট করো
        }
    });
});


</script>
