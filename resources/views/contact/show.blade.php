@extends('layouts.admin')

@section('pagetitle')
    Contact Details
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between bg-secondary">
        <h6 class="card-title m-0 font-weight-bold text-light">Contact Details</h6>
        <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Tag List">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <tr>
                <th></th>
                <td>
                    @if ($contact->photo)
                        <img src="{{url(Storage::url($contact->photo))}}" class="img-profile rounded-circle" alt="image" class="image-fluid rounded-circle" height="100px">
                    @else
                        <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="image">
                    @endif
                </td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $contact->phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $contact->email }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection