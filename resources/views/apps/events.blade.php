@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Events')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-3 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">Travel</p>
                    <h5 class="mb-0">12</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-3 mb-xl-0">
                    <p class="text-muted mb-1">Important</p>
                    <h5 class="mb-0">13</h5>
                </div>
                <div class="border-right pr-4 mb-3 mb-xl-0">
                    <p class="text-muted mb-1">Work</p>
                    <h5 class="mb-0">25</h5>
                </div>
                <div class="mb-3 mb-xl-0">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addevent">Add New Event</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light page_menu m-b-15">
            <a class="navbar-brand" href="javascript:void(0);">M.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-muted"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('apps.calendar')}}">Calendar</a></li>
                    <li class="{{ Request::segment(2) === 'events' ? 'nav-item active' : null }}"><a class="nav-link"  href="{{route('apps.events')}}">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.campaign')}}">Campaign</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Conference</a></li>
                </ul>
                <div class="ml-auto">
                    <a href="{{route('pages.settings')}}" class="btn btn-default">Settings</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card">
            <div class="body">
                <div class="mb-5">
                    <div class="font-40">28</div>
                    <span>April - 2020</span>
                </div>
                <h5>TechLunch - Developer Stories</h5>
                <span class="font-12 text-muted">2PM - 4PM</span>
                <address class="text-muted">123 6th St. Melbourne, FL 32904</address>
                <button class="btn btn-dark btn-sm">Join</button>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card">
            <div class="body">
                <div class="mb-5">
                    <div class="font-40">13</div>
                    <span>Jun - 2020</span>
                </div>
                <h5>Cyber Security Conference</h5>
                <span class="font-12 text-muted">11AM - 2PM</span>
                <address class="text-muted">514 S. Magnolia St. Orlando, FL 32806</address>
                <button class="btn btn-dark btn-sm">Join</button>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card">
            <div class="body">
                <div class="mb-5">
                    <div class="font-40">19</div>
                    <span>Jun - 2020</span>
                </div>
                <h5>International PHP Conference</h5>
                <span class="font-12 text-muted">3:30PM - 5PM</span>
                <address class="text-muted">123 6th St. Melbourne, FL 32904</address>
                <button class="btn btn-dark btn-sm">Join</button>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card">
            <div class="body">
                <div class="mb-5">
                    <div class="font-40">28</div>
                    <span>September - 2020</span>
                </div>
                <h5>Social Media Marketing World</h5>
                <span class="font-12 text-muted">3PM - 4:30PM</span>
                <address class="text-muted">44 Shirley Ave. West Chicago, IL 60185</address>
                <button class="btn btn-dark btn-sm">Join</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/calendar.js') }}"></script>
@stop