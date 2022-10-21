@extends('layouts.admin')

@section('pagetitle')
    Trashed
@endsection

@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-left-info">
        <h6 class="m-0 font-weight-bold text-primary">Trashed Contact List ({{ $contacts->count() }})</h6>
        <div class="dropdown no-arrow">
            <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contact List"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div id="contact_data">
        @forelse ($contacts as $contact)
        <hr class="contact-ruller">
        <div class="head-contact-div">
            <div class="contact-div">
                <a href="#" class="contact-list">
                    <div class="contact-list-photo">
                        @if ($contact->photo)
                            <img src="{{url(Storage::url($contact->photo))}}" class="img-profile rounded-circle" alt="image" class="image-fluid rounded-circle" height="50px">
                        @else
                            <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="image" height="50px">
                        @endif
                    </div>
                    <div class="d-block d-sm-none contact-list-row">{{ $contact->name }} <br><span>{{ $contact->phone }}</span></div>
                    <div class="d-none d-sm-block contact-list-row">{{ $contact->name }}</div>
                    <div class="d-none d-sm-table-cell contact-list-row"><span> {{ $contact->phone }}</span></div>
                    <div class="d-none d-lg-table-cell contact-list-row"><span>{{ $contact->homephone }}</span></div>
                    <div class="d-none d-md-table-cell contact-list-row"><span> {{ $contact->email }} </span></div>
                </a>
            </div>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in dropdown-btn"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-item">
                        {!! Form::open(['method' => 'post','route' => ['contact.trashed.destroy', $contact->id]]) !!}
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle me-1"><i class="fas fa-trash"></i></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="dropdown-item">
                        {!! Form::open(['method' => 'post','route' => ['contact.trashed.restore', $contact->id]]) !!}
                        <button onclick="return confirm('Are you sure?')" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-undo-alt"></i></button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="mt-2">
            <p class="text-danger text-center"><strong>Empty</strong></p>
        </div>
        @endforelse
    </div>
</div>

@endsection


{{-- 
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
            <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contact List"><i class="fas fa-arrow-left"></i></a>
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
                    <th>Home Phone</th>
                    <th>Office Phone</th>
                    <th>Email</th>
                    <th>Email (optional)</th>
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
                        <td>{{ $contact->homephone }}</td>
                        <td>{{ $contact->officephone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->opemail }}</td>
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
@endsection --}}