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

    @include('contact.searchfilterform')

    {{-- favourite contact --}}
    @include('contact.favlist')

    {{-- contact --}}
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