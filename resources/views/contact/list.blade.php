@forelse ($contacts as $contact)
<hr class="contact-ruller">
<div class="head-contact-div">
    <div class="contact-div">
        <a href="{{url('contact/'.$contact->id)}}" class="contact-list">
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
                {!! Form::open(['method' => 'delete','route' => ['contact.destroy', $contact->id]]) !!}
                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle me-1">
                    <i class="fas fa-trash"></i>
                </button>
                {!! Form::close() !!}
            </div>
            <div class="dropdown-item">
                <a href="{{url('contact/'.$contact->id.'/edit')}}" class="btn btn-primary btn-circle btn-sm me-1" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
            <div class="dropdown-item">
                @if ($contact->isfavourite == 1)
                    {!! Form::open(['method' => 'put','route' => ['contact.favorite', $contact->id]]) !!}
                        <button class="btn btn-danger btn-sm btn-circle" title="Remove Favourite">
                            <i class="fas fa-star"></i>
                        </button>
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['method' => 'put','route' => ['contact.favorite', $contact->id]]) !!}
                        <button class="btn btn-success btn-sm btn-circle" title="Add Favourite">
                            <i class="far fa-star"></i>
                        </button>
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
</div>
@empty
<div class="mt-2">
    <p class="text-danger text-center"><strong>Empty</strong></p>
</div>
@endforelse