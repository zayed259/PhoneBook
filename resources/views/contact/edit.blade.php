@extends('layouts.admin')

@section('pagetitle')
    Update Contact
@endsection

@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between bg-secondary">
            <h6 class="card-title m-0 font-weight-bold text-light">Update Contact</h6>
            <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contact List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
        </div>
        <div class="card-body text-center">
            @if ($contact->photo)
                <img src="{{url(Storage::url($contact->photo))}}" alt="image" class="image-fluid rounded-circle" height="100px">
            @else
                <img src="{{url('assets/img/avatars/avatar.jpg')}}" alt="image">
            @endif
        </div>
        <div class="card-body">
            {!! Form::model($contact, ['method' => 'put','enctype'=>'multipart/form-data','class'=>'user','route' => ['contact.update', $contact->id]]) !!}
            @include('contact.form')

            <div class="form-group">
                {!! Form::submit('Update Contact', ['class'=>'btn btn-primary btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

