<table class="table table-hover my-0">
    <thead>
        <tr>
            <th colspan="5">
                <h5 class="font-weight-bold text-uppercase">Favourites: ({{ $favouritecontacts->count() }})</h5>
            </th>
    </thead>
    <tbody>
        @foreach ($favouritecontacts as $contact)
        <tr>
            <td>
                @if ($contact->photo)
                    <img src="{{url(Storage::url($contact->photo))}}" alt="image" class="img-profile rounded-circle" height="50px">
                    
                @else
                    <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="image">
                @endif
            </td>
            <td>{{ $contact->name }}</td>
            <td class="d-none d-xl-table-cell">{{ $contact->phone }}</td>
            <td class="d-none d-xl-table-cell">{{ $contact->email }}</td>
            <td class="d-flex justify-content-center" width="120px">
                <a href="{{url('contact/'.$contact->id)}}" class="btn btn-primary btn-circle btn-sm me-1" title="View">
                    <i class="fas fa-eye"></i>
                </a>

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
            </td>
        </tr>
    </tbody>
    @endforeach
</table>