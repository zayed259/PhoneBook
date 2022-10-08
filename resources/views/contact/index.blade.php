@extends('layouts.admin')

@section('pagetitle')
    Contact
@endsection

@section('content')
<div class="card flex-fill">
    <!-- Card Header - Dropdown -->
    <div class="card-header d-flex flex-row align-items-center justify-content-between bg-secondary">
        <h6 class="card-title m-0 font-weight-bold text-light">Contact List</h6>
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
    {{-- search contact --}}
    <div class="card-body">
        <div class="form-group">
            {!! Form::text('search', null, ['class'=>'form-control', 'id'=>'search', 'placeholder'=>'Search']) !!}
        </div>
    </div>
    {{-- favourite contact --}}
    <table class="table table-hover my-0">
        <thead>
            {{-- sum Contact --}}
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
                <td class="d-flex justify-content-between" width="120px">
                    {{-- favourite --}}
                    @if ($contact->favourite)
                        <a href="{{url('contact/'.$contact->id.'/favourite')}}" class="btn btn-primary btn-circle btn-sm fav" title="Favourite">
                            <i class="fas fa-star"></i>
                        </a>
                    @else
                        <a href="{{url('contact/'.$contact->id.'/favourite')}}" class="btn btn-primary btn-circle btn-sm fav" title="Favourite">
                            <i class="far fa-star"></i>
                        </a>
                    @endif

                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    {{-- contact --}}
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
                <a href="#">
                    <tr>
                        <td>
                            @if ($contact->photo)
                                <img src="{{url(Storage::url($contact->photo))}}" class="img-profile rounded-circle" alt="image" class="image-fluid rounded-circle" height="50px">
                            @else
                                <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="image">
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
                            {{-- favourite --}}
                            @if ($contact->favourite)
                                {{-- <a href="{{url('contact/'.$contact->id.'/favourite')}}" class="btn btn-primary btn-circle btn-sm fav" title="Favourite" data-id="{{$contact->id}}" data-fav="{{$contact->favourite}}">
                                    <i class="fas fa-star"></i>
                                </a> --}}
                                <button class="btn btn-primary btn-circle btn-sm fav" data-fav="{{$contact->favourite}}" data-id="{{$contact->id}}"><i class="fas fa-star"></i></button>
                            @else
                                {{-- <a href="{{url('contact/'.$contact->id.'/favourite')}}" class="btn btn-primary btn-circle btn-sm fav" title="Favourite" data-id="{{$contact->id}}" data-fav="{{$contact->favourite}}">
                                    <i class="far fa-star"></i>
                                </a> --}}
                                <button class="btn btn-primary btn-circle btn-sm fav" data-fav="{{$contact->favourite}}" data-id="{{$contact->id}}"><i class="far fa-star"></i></button>
                            @endif
                            {{-- <a href="{{url('contact/'.$contact->id.'/favourite')}}" class="btn btn-primary btn-circle btn-sm" title="Favourite" data-fav="{{$contact->favourite}}" data-id="{{$contact->id}}">
                                <i class="far fa-star"></i>
                            </a> --}}
                            {{-- <button class="btn btn-primary btn-circle btn-sm fav" data-fav="{{$contact->favourite}}" data-id="{{$contact->id}}"><i class="far fa-star"></i></button> --}}

                        </td>
                    </tr>
                </a>
            @endforeach
        </tbody>

    </table>
</div>
@endsection


@section("script")
<script>
$(document).ready(function () {
    //autocomplete
    $("#search").autocomplete({
        source: "{{url('search')}}",
        minLength: 1,
        select: function (event, ui) {
            console.log(ui.item.value);
            $("#search").val(ui.item.value);
        }
    });
    
    

    // $('.fav').click(function () {
    //     var id = $(this).data('id');
    //     var favourite = $(this).data('fav')?0:1;
    //     alert(id);
    //     $.ajax({
    //         type: "POST",
    //         url: "{{url('favourite')}}",
    //         data: {
    //             favourite : favourite,
    //             id : id,
    //         },
    //         success: function (response) {
    //             console.log(response);
    //             if(response.done == 1){
    //                 alert(response.message);
    //                 location.reload();
    //             }else{
    //                 alert(response.message);
    //             }

    //         }

    //     });
    // });
    // $(document).on("click",'.fav',function(){
    //     var id = $(this).data('id');
    //     var favourite = $(this).data('fav') == 1 ? 0 : 1;
    //     alert(favourite);
    //     $.ajax({
    //         type: "POST",
    //         url: "{{url('favourite')}}",
    //         data: {
    //             id : id,
    //             favourite : favourite,
    //         },
    //         alert(data);
    //         success: function (response) {
    //             console.log(response);
    //             if(response.done == 1){
    //                 alert(response.message);
    //                 location.reload();
    //             }else{
    //                 alert(response.message);
    //             }

    //             document.location.reload(true);

    //         }

    //     });
    // });
});
</script>
@endsection