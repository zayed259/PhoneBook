@extends('layouts.admin')

@section('pagetitle')
    Profile
@endsection

@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-left-info">
        <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
        <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contactlist">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
    </div>
    <div class="card-body">
        @if ($user->profile)
        <div class="mb-3 text-center">
            <img src="{{url(Storage::url($user->profile->image))}}" class="profileimage rounded-circle" alt="Profile Image">
        </div>
        {!! Form::model($user->profile, ['method' => 'PUT','enctype'=>'multipart/form-data','class'=>'user','route' => ['profile.update', $user->profile->id]]) !!}
        @else
        {!! Form::open(['route' => ['profile.store'] ,'class'=>'user', 'enctype'=>'multipart/form-data']) !!}
        @endif
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                {!! Form::text('fullname', null, ['class'=>'form-control form-control-profile', 'id'=>'name', 'placeholder'=>'Name']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::text('phone', null, ['class'=>'form-control form-control-profile', 'id'=>'phone', 'placeholder'=>'Phone Number']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::text('address', null, ['class'=>'form-control form-control-profile', 'id'=>'address', 'placeholder'=>'Address']) !!}
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                {!! Form::file('image', ['class'=>'form-control form-control-profile', 'id'=>'image']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::select('bloodgroup', $bloodgroup, null, ['placeholder' => 'Blood Group', 'class'=>'form-control form-control-profile']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Update Profile', ['class'=>'btn btn-primary btn-profile btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection