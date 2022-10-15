<table class="table table-hover my-0">
    <thead>
        {{-- sum Contact --}}
        <tr>
            <th colspan="5">
                <h5 class="font-weight-bold text-uppercase">Contacts: ({{ $contacts->count() }})</h5>
            </th>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>
                    @if ($contact->photo)
                        <img src="{{url(Storage::url($contact->photo))}}" class="img-profile rounded-circle" alt="image" class="image-fluid rounded-circle" height="50px">
                    @else
                        <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="image" height="50px">
                    @endif
                </td>
                <td>{{ $contact->name }}</td>
                <td class="d-none d-xl-table-cell">{{ $contact->phone }}</td>
                <td class="d-none d-xl-table-cell">{{ $contact->email }}</td>
                <td class="d-flex justify-content-between mt-2" width="120px">
                    {!! Form::open(['method' => 'delete','route' => ['contact.destroy', $contact->id]]) !!}
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle me-1">
                            <i class="fas fa-trash"></i>
                        </button>
                    {!! Form::close() !!}
                    <a href="{{url('contact/'.$contact->id.'/edit')}}" class="btn btn-primary btn-circle btn-sm me-1" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{url('contact/'.$contact->id)}}" class="btn btn-primary btn-circle btn-sm me-1" title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    {{-- isfavourite button --}}
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
        @endforeach
    </tbody>
</table>