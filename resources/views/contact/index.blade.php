@extends('layouts.admin')

@section('pagetitle')
    Contact
@endsection

@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3 border-left-info" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Favourite Contact List ({{ $favouritecontacts->count() }})</h6>
    </a>
    <div class="collapse" id="collapseCardExample">
        @include('contact.favlist')
    </div>
</div>
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-left-info">
        <h6 class="m-0 font-weight-bold text-primary">Contact List ({{ $contacts->count() }})</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Select Option:</div>
                <a class="dropdown-item" href="{{url('contact/create')}}"><i class="far fa-plus-square fa-sm fa-fw mr-1"></i>Add Contact</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('contact/trashed')}}"><i class="fas fa-trash-alt fa-sm fa-fw mr-1"></i>Trashed Contact</a>
                <a class="dropdown-item" href="{{url('export_contact_pdf')}}"><i class="fas fa-file-pdf fa-sm fa-fw mr-1"></i>Export PDF</a>
            </div>
        </div>
    </div>
    @include('contact.searchfilterform')
    <!-- Card Body -->
    <div id="contact_data">
        @include('contact.list')
    </div>
</div>

@endsection

@section('script')
    <script>
        $("#search").keyup(function(){
        console.log(43243);
        let url = "{{url()->full()}}";
        get_contact_data(url);
    });
    $(document).on('change', '#filter', function(){
        let url = "{{url()->full()}}";
        
        get_contact_data(url);
    });
    get_contact_data = (url) =>{
        let form = $('#searchform');
        $.ajax({
            method: "get",
            url: url,
            headers: {"X-CSRF-TOKEN": "{{csrf_token()}}"},
            data: form.serialize(),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            error: function(xhr, status, error) {
                swal({
                    title:'Error '+error,
                        text: xhr.responseJSON.message,
                        icon: "error",
                    });
            },
            success: function(data)
            {
                if (data.error == true) {
                    swal({
                            title: 'Error',
                            text: data.message,
                            icon: "error",
                        });
                }else{
                    $('#contact_data').html(data.data);
                }
            }
        });
    }
    </script>
@endsection