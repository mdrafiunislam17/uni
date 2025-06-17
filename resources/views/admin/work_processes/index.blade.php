@extends("admin.layouts.master")
@section("title", "workProcesses")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">workProcesses</h1>
            <a href="{{ route("works.create") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create workProcesses</a>
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
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $workProcesses as $i => $work)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $work->name }}</td>
                                <td><img src="{{ asset("uploads/work/$work->icon") }}" width="100" alt=""></td>
                                <td>
                                    @if ($work->status == 1)
                                        <span class="badge badge-success badge-counter">Active</span>
                                    @else
                                        <span class="badge badge-danger badge-counter">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    {{--                                    <a href="{{ route("$clients.show", $client->id) }}" class="btn btn-sm"><i--}}
                                    {{--                                            class="fa fa-eye"></i></a>--}}
                                    <a href="{{ route("works.edit", $work->id) }}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    <form action="{{ route('works.destroy', $work->id) }}" method="post" class="d-inline delete-form" data-id="{{ $work->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger delete-btn h-100" data-id="{{ $work->id }}">
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
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel"><i class="fa fa-trash me-2"></i> Confirm Deletion</h5>
                    {{--                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    {{--                --}}
                </div>
                <div class="modal-body text-center">
                    <p class="fs-5">Are you sure you want to delete this Client?</p>
                    <i class="fa fa-exclamation-triangle fa-2x text-warning"></i>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary px-4" id="cancel" data-dismiss="modal">Cancel</button>

                    <button type="button" class="btn btn-danger px-4" id="confirmDeleteBtn">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>





@endsection



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


    $(document).ready(function () {
        let deleteForm = null;

        // Delete button click
        $('.delete-btn').click(function () {
            deleteForm = $(this).closest('form'); // Store the form
            $('#deleteModal').modal('show'); // Show modal
        });

        // Confirm delete from modal
        $('#confirmDeleteBtn').click(function () {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
    });

</script>



