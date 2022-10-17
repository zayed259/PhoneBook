@extends('layouts.admin')

@section('pagetitle')
    Add Contact
@endsection

@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add Contact</h6>
        <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contact List">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

        {{Form::open(['route' => 'contact.store','class'=>'user','enctype'=>'multipart/form-data'])}}
        @include('contact.form')

        <div class="form-group">
            {!! Form::submit('Add Contact', ['class'=>'btn btn-primary btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

