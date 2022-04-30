@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Calendar')


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
        <nav class="navbar navbar-expand-lg navbar-light bg-light page_menu">
            <a class="navbar-brand" href="javascript:void(0);">M.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-muted"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{route('apps.calendar')}}">Calendar</a></li>
                    <li class="nav-item"><a class="nav-link"  href="{{route('apps.events')}}">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.campaign')}}">Campaign</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Conference</a></li>
                </ul>
                <div class="ml-auto">
                    <a href="{{route('pages.settings')}}" class="btn btn-default">Settings</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addevent" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Add Event</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group c_form_group">
                            <label>Event Title</label>
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Event Title">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group c_form_group">
                            <label>Select event date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Event Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group c_form_group">
                            <label>Description</label>
                            <div class="form-line">
                                <textarea rows="4" class="form-control no-resize" placeholder="Event Description..."></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Add</button>
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