@extends('layouts.admin')

@section('pagetitle')
    Trashed
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-secondary">
        <h6 class="m-0 font-weight-bold text-light">Trashed Contact List</h6>
        <div class="dropdown no-arrow">
            <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contact List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th width="180px">Action</th>
                </tr>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>
                            @if ($contact->photo)
                                <img src="{{url(Storage::url($contact->photo))}}" class="img-profile rounded-circle" alt="image" class="image-fluid rounded-circle" height="50px">
                            @else
                                <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="image">
                            @endif
                        </td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td class="d-flex justify-content-center">
                            {!! Form::open(['method' => 'post','route' => ['contact.trashed.destroy', $contact->id]]) !!}
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm me-2"><i class="fas fa-trash"></i></button>
                            {!! Form::close() !!}

                            {!! Form::open(['method' => 'post','route' => ['contact.trashed.restore', $contact->id]]) !!}
                                <button onclick="return confirm('Are you sure?')" class="btn btn-primary btn-sm"><i class="fas fa-undo-alt"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection