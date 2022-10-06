@extends('layouts.admin')

@section('pagetitle')
    Contact
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-secondary">
        <h6 class="m-0 font-weight-bold text-light">Contact List</h6>
        <div>
            <a class="btn btn-primary btn-sm" href="{{url('contact/create')}}">
                <i class="fas fa-plus fa-sm"></i>
                Add
            </a>
            <a class="btn btn-primary btn-sm" href="{{url('contact/trashed')}}">
                <i class="fas fa-trash-alt fa-sm"></i>
                Trashed
            </a>
            <a class="btn btn-primary btn-sm" href="{{url('export_contact_pdf')}}">
                <i class="fas fa-file-pdf fa-sm"></i>
                PDF
            </a>
        </div>
    </div>
    
    @include('partial.flash')
    @include('partial.error')
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
                                <img src="{{url(Storage::url($contact->photo))}}" class="image" alt="image" class="image-fluid rounded-circle" height="50px">
                            @else
                                <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="image" alt="image">
                            @endif
                        </td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td class="d-flex justify-content-between">
                            {!! Form::open(['method' => 'delete','route' => ['contact.destroy', $contact->id]]) !!}
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle">Delete</button>
                            {!! Form::close() !!}
                            <a href="{{url('contact/'.$contact->id.'/edit')}}" class="btn btn-primary btn-circle btn-sm" title="Edit">
                                Edit
                            </a>
                            <a href="{{url('contact/'.$contact->id)}}" class="btn btn-primary btn-circle btn-sm" title="View">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- {!! $contacts->links() !!} --}}
        </div>
    </div>
</div>
@endsection