@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Inbox Detail')


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
            <a href="{{route('apps.inboxcompose')}}" class="btn btn-dark">Compose</a>
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
                    <div class="mail-detail-full">
                        <div class="mail-action clearfix">
                            <div>
                                <a href="{{route('apps.inbox')}}" class="btn btn-primary theme-bg btn-sm"><i class="fa fa-arrow-left"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <a href="javascript:void(0);" class="btn btn-default btn-sm hidden-sm"><i class="fa fa-refresh"></i></a>                                        
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-tag"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);">Tag 1</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Tag 2</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Tag 3</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail-header">
                            <div class="media">
                                <div class="float-left">
                                    <div class="m-r-20"><img src="{{ asset('assets/images/sm/avatar1.jpg') }}" alt=""></div>
                                </div>
                                <div class="media-body">
                                    <p class="mb-0"><strong class="text-muted m-r-5">From:</strong><a class="text-default" href="javascript:void(0);">info@example.com</a><span class="text-muted text-sm float-right">12:48, 23.06.2018</span></p>
                                    <p class="mb-0"><strong class="text-muted m-r-5">To:</strong>Me <small class="text-muted float-right"><i class="zmdi zmdi-attachment m-r-5"></i>(2 files, 89.2 KB)</small></p>
                                    <p class="mb-0"><strong class="text-muted m-r-5">CC:</strong><a class="text-default" href="javascript:void(0);">mail@example.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="mail-cnt">
                            <p>Hello <strong>Marshall Nichols</strong>,</p><br>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <ul>
                                <li>standard dummy text ever since the 1500s, when an unknown printer</li>
                                <li>Lorem Ipsum has been the industry's standard dummy</li>
                            </ul>
                            <p>printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrnturies, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <br>
                            <p>Thank youm,<br><strong>Michael Bradley</strong></p>
                            <hr>
                            <strong>Click here to</strong>
                            <a href="{{route('apps.inboxcompose')}}">Reply</a> or
                            <a href="{{route('apps.inboxcompose')}}">Forward</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')

@stop

@section('vendor-script')
@stop

@section('page-script')
<script>
    $('.toggle-email-nav').on('click', function() {
		$('.mail-left').toggleClass('open');
	});
</script>
@stop