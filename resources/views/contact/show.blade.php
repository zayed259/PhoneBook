@extends('layouts.admin')

@section('pagetitle')
    Contact Details
@endsection

@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <a href="{{url('contact')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Contact List">
            <i class="fas fa-arrow-left"></i>
        </a>
        <a href="{{url('contact/'.$contact->id.'/edit')}}" class="btn btn-primary btn-circle btn-sm me-1" title="Edit">
            <i class="fas fa-edit"></i>
        </a>
        {{-- <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6> --}}
    </div>
    <!-- Card Body -->
    <div class="card-body p-0 m-0">
        <div class="contact-details">
            <div class="contact-photo">
                @if ($contact->photo)
                <img src="{{url(Storage::url($contact->photo))}}" alt="image">
                @else
                    <img src="{{url('assets/img/avatars/avatar.jpg')}}" alt="image">
                @endif
            </div>
            <div class="name-contact">
                <h1> {{ $contact->name }}</h1>
                <p>{{ $contact->phone }}</p>
            </div>
            <div class="icons text-center">
                @if ($contact->email)
                <a href="mailto:{{$contact->email}}" class="btn btn-primary btn-circle me-1" title="Email">
                    <i class="fas fa-envelope"></i>
                </a>
                @endif
                @if ($contact->phone)
                <a href="tel:{{$contact->phone}}" class="btn btn-primary btn-circle me-1" title="Call">
                    <i class="fas fa-phone"></i>
                </a>
                @endif
                @if ($contact->whatsapp)
                <a href="https://api.whatsapp.com/send?phone={{$contact->whatsapp}}" class="btn btn-primary btn-circle me-1" title="Whatsapp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                @endif
                @if ($contact->facebook)
                <a href="https://www.facebook.com/{{$contact->facebook}}" target="_blank" class="btn btn-primary btn-circle me-1" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                @endif
                @if ($contact->instagram)
                <a href="https://www.instagram.com/{{$contact->instagram}}" target="_blank" class="btn btn-primary btn-circle me-1" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                @endif
                @if ($contact->twitter)
                <a href="https://twitter.com/{{$contact->twitter}}" target="_blank" class="btn btn-primary btn-circle me-1" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                @endif
                @if ($contact->linkedin)
                <a href="https://www.linkedin.com/in/{{$contact->linkedin}}" target="_blank" class="btn btn-primary btn-circle me-1" title="Linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                @endif
            </div>
        </div>
        
        <div class="contact-info">
            <div>
                <h1>Phone</h1>
                <p>{{ $contact->phone }}</p>
            </div>
            <div>
                <a href="tel:{{$contact->phone}}" class="btn btn-primary btn-circle" title="Call">
                    <i class="fas fa-phone"></i>
                </a>
            </div>
        </div>
        @if ($contact->homephone)
        <hr class="contact-ruller">
        <div class="contact-info">
            <div>
                <h1>Home Phone</h1>
                <p>{{ $contact->homephone }}</p>
            </div>
            <div>
                <a href="tel:{{$contact->homephone}}" class="btn btn-primary btn-circle" title="Call">
                    <i class="fas fa-phone"></i>
                </a>
            </div>
        </div>
        <hr class="contact-ruller">
        @endif
        @if ($contact->officephone)
        <div class="contact-info">
            <div>
                <h1>Office Phone</h1>
                <p>{{ $contact->officephone }}</p>
            </div>
            <div>
                <a href="tel:{{$contact->officephone}}" class="btn btn-primary btn-circle" title="Call">
                    <i class="fas fa-phone"></i>
                </a>
            </div>
        </div>
        <hr class="contact-ruller">
        @endif
        @if ($contact->email)
        <div class="contact-info">
            <div>
                <h1>Email</h1>
                <p>{{ $contact->email }}</p>
            </div>
            <div>
                <a href="mailto:{{$contact->email}}" class="btn btn-primary btn-circle" title="Email">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
        <hr class="contact-ruller">
        @endif
        @if ($contact->opemail)
        <div class="contact-info">
            <div>
                <h1>Optional Email</h1>
                <p>{{ $contact->opemail }}</p>
            </div>
            <div>
                <a href="mailto:{{$contact->opemail}}" class="btn btn-primary btn-circle" title="Email">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
        <hr class="contact-ruller">
        @endif
        @if ($contact->website)
        <div class="contact-info">
            <div>
                <h1>Website</h1>
                <p>{{ $contact->website }}</p>
            </div>
            <div>
                <a href="{{$contact->website}}" target="_blank" class="btn btn-primary btn-circle" title="Website">
                    <i class="fas fa-globe"></i>
                </a>
            </div>
        </div>
        <hr class="contact-ruller">
        @endif
        @if ($contact->address)
        <div class="contact-info">
            <div>
                <h1>Address</h1>
                <p>{{ $contact->address }}</p>
            </div>
            <div>
                <a href="https://www.google.com/maps/search/?api=1&query={{$contact->address}}" target="_blank" class="btn btn-primary btn-circle" title="Address">
                    <i class="fas fa-map-marker-alt"></i>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection