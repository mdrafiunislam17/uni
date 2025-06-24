@extends('admin.layouts.master')
@section('title', 'Edit Application')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Application – {{ $application->first_name }} {{ $application->last_name }}</h1>
        <a href="{{ route('applications.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> Applications
        </a>
    </div>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul class="m-0">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    {{-- Flash messages --}}
    @foreach (['success', 'error'] as $msg)
        @if(session()->has($msg))
            <div class="alert alert-{{ $msg == 'success' ? 'success' : 'danger' }}">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session($msg) }}
            </div>
        @endif
    @endforeach

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('applications.update', $application->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Course --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Course Name</label>
                    <div class="col-sm-6">
                        <select name="course_id" class="form-control" required>
                            <option value="">-- Select Course --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $application->course_id) == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- First Name --}}
                <div class="form-group row">
                    <label for="first_name" class="col-sm-3 col-form-label text-right font-weight-bold">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="first_name" id="first_name" class="form-control"
                               value="{{ old('first_name', $application->first_name) }}">
                    </div>
                </div>

                {{-- Last Name --}}
                <div class="form-group row">
                    <label for="last_name" class="col-sm-3 col-form-label text-right font-weight-bold">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="last_name" id="last_name" class="form-control"
                               value="{{ old('last_name', $application->last_name) }}">
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="email" class="form-control"
                               value="{{ old('email', $application->email) }}">
                    </div>
                </div>

                {{-- Phone --}}
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone</label>
                    <div class="col-sm-6">
                        <input type="text" name="phone" id="phone" class="form-control"
                               value="{{ old('phone', $application->phone) }}">
                    </div>
                </div>

                {{-- Postal Address --}}
                <div class="form-group row">
                    <label for="postal_address" class="col-sm-3 col-form-label text-right font-weight-bold">Postal Address</label>
                    <div class="col-sm-6">
                        <input type="text" name="postal_address" id="postal_address" class="form-control"
                               value="{{ old('postal_address', $application->postal_address) }}">
                    </div>
                </div>

                {{-- Visa Type --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Visa Status (Type)</label>
                    <div class="col-sm-6">
                        <select name="visa_type_id" class="form-control" required>
                            <option value="">-- Select Visa Type --</option>
                            @foreach($visaTypes as $visaType)
                                <option value="{{ $visaType->id }}" {{ old('visa_type_id', $application->visa_type_id) == $visaType->id ? 'selected' : '' }}>
                                    {{ $visaType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Referrer Name --}}
                <div class="form-group row">
                    <label for="referrer_name" class="col-sm-3 col-form-label text-right font-weight-bold">Referrer Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="referrer_name" id="referrer_name" class="form-control"
                               value="{{ old('referrer_name', $application->referrer_name) }}">
                    </div>
                </div>

                {{-- Referrer Phone --}}
                <div class="form-group row">
                    <label for="referrer_phone" class="col-sm-3 col-form-label text-right font-weight-bold">Referrer Phone</label>
                    <div class="col-sm-6">
                        <input type="text" name="referrer_phone" id="referrer_phone" class="form-control"
                               value="{{ old('referrer_phone', $application->referrer_phone) }}">
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="form-group row">
                    <div class="offset-3 col-sm-6 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('applications.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
