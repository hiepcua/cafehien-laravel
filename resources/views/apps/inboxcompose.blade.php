@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Inbox Compose')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-6 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-6 col-md-7 col-sm-12 text-md-right">
            <a href="{{route('pages.settings')}}" class="btn btn-default">Settings</a>
            <a href="{{route('apps.inbox')}}" class="btn btn-dark">Inbox</a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="mail-inbox">
                <div class="mobile-left">
                    <a href="javascript:void(0);" class="btn btn-primary theme-bg toggle-email-nav"><i class="fa fa-bars"></i></a>
                </div>
                <div class="mail-left">
                    <ul class="nav">
                        <li class="active"><a href="{{route('apps.inbox')}}"><i class="icon-drawer"></i>Inbox<span class="badge badge-default float-right">13</span></a></li>
                        <li><a href="javascript:void(0);"><i class="icon-cursor"></i>Sent<span class="badge badge-default float-right">6</span></a></li>
                        <li><a href="javascript:void(0);"><i class="icon-envelope-open"></i>Draft</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-action-redo"></i>Outbox</a></li>                                        
                        <li><a href="javascript:void(0);"><i class="icon-trash"></i>Trash</a></li>
                    </ul>
                    <h3 class="label">Labels</h3>
                    <ul class="nav">
                        <li><a href="javascript:void(0);"><i class="fa fa-circle-o text-danger"></i>Friends</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-circle-o text-info"></i>Support</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-circle-o text-dark"></i>Paypal</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-circle-o text-primary"></i>Support</a></li>
                    </ul>
                    <h3 class="label">Chat</h3>
                    <ul class="right_chat list-unstyled mb-0">
                        <li class="online">
                            <a href="javascript:void(0);" class="media">
                                <img class="media-object" src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="">
                                <div class="media-body">
                                    <span class="name">Louis Henry</span>
                                    <span class="message">How do you do?</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);" class="media">
                                <img class="media-object" src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="">
                                <div class="media-body">
                                    <span class="name">Debra Stewart</span>
                                    <span class="message">I was wondering...</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);" class="media">
                                <img class="media-object" src="{{ asset('assets/images/xs/avatar3.jpg') }}" alt="">
                                <div class="media-body">
                                    <span class="name">Lisa Garett</span>
                                    <span class="message">I've forgotten how it felt before</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </a>                            
                        </li>
                    </ul>
                </div>
                <div class="mail-right check-all-parent">
                    <div class="mail-compose">
                        <form>
                            <div class="form-group mb-1">
                                <input type="text" class="form-control" placeholder="To">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="CC">
                            </div>
                        </form>
                        <hr>
                        <div class="summernote">
                            Hello!,
                            <br/>
                            <br/>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                            <p><strong>Note:</strong> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <ul>
                                <li>New code update on GitHub</li>
                                <li>There are many variations of passages of Lorem Ipsum available</li>
                            </ul>                                        
                            <span><strong>Thank you!</strong></span>
                            <p>Mooli Admin</p>
                        </div>
                        <div class="m-t-30">
                            <button type="button" class="btn btn-primary theme-bg">Send Message</button>
                            <button type="button" class="btn btn-default">Draft</button>
                            <a href="app-inbox.html" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote-bs4.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/summernote/dist/summernote-bs4.min.js') }}"></script>
@stop

@section('page-script')

<script>
    $('.toggle-email-nav').on('click', function() {
		$('.mail-left').toggleClass('open');
	});

    $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 1,
        height: 300
    });
</script>
@stop
