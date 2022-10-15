@extends('layouts.admin')

@section('pagetitle')
    Contact Details
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between bg-secondary">
        <h6 class="card-title m-0 font-weight-bold text-light">Contact Details</h6>
        <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contact List">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <div class="text-center">
                @if ($contact->photo)
                <img src="{{url(Storage::url($contact->photo))}}" class="img-profile rounded-circle" alt="image" class="image-fluid rounded-circle" height="100px">
                @else
                    <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="image" height="100px">
                @endif
            </div>
            <tr>
                <th>Name</th>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $contact->phone }}</td>
            </tr>
            @if ($contact->homephone)
                <tr>
                    <th>Home Phone</th>
                    <td>{{ $contact->homephone }}</td>
                </tr>
            @endif
            @if ($contact->officephone)
                <tr>
                    <th>Office Phone</th>
                    <td>{{ $contact->officephone }}</td>
                </tr>
            @endif
            @if ($contact->email)
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
            @endif
            @if ($contact->opemail)
                <tr>
                    <th>Email (secondary)</th>
                    <td>{{ $contact->opemail }}</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection