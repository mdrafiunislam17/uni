@extends("admin.layouts.master")
@section("title", "View Contact")

<style>
    .message-box p {
        margin-bottom: 8px;
        font-size: 15px;
    }
</style>

@section("content")
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">View Contact</h1>
            <a href="{{ route('contact.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to List
            </a>
        </div>

        <!-- Contact Details Card -->
        <div class="card shadow border-left-primary">
            <div class="card-header bg-primary text-white">
                <h6 class="m-0 font-weight-bold">Contact Information</h6>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-3 text-right font-weight-bold">Name:</div>
                    <div class="col-sm-9">{{ $contact->name }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3 text-right font-weight-bold">Email:</div>
                    <div class="col-sm-9">{{ $contact->email }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3 text-right font-weight-bold">Phone:</div>
                    <div class="col-sm-9">{{ $contact->phone ?? 'N/A' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3 text-right font-weight-bold">Subject:</div>
                    <div class="col-sm-9">{{ $contact->subject ?? 'N/A' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3 text-right font-weight-bold">Message:</div>
                    <div class="col-sm-9">
                        <div class="border rounded p-2 bg-light">
                            {!! ($contact->message) !!}
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3 text-right font-weight-bold">Status:</div>
                    <div class="col-sm-9">
                        @if ($contact->status == 1)
                            <span class="badge badge-success px-3 py-1">Active</span>
                        @else
                            <span class="badge badge-secondary px-3 py-1">Inactive</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
