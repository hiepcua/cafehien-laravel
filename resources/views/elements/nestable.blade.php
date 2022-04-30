@extends('layout.master')
@section('parentPageTitle', 'Elements')
@section('title', 'Nestable Sortable')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Nestable Handle</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu theme-bg">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="dd nestable-with-handle">
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" data-id="1">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="2">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">It is a long established fact that a reader will be distracted by the readable</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="3">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">it look like readable English. Many desktop publishing </div>
                            <ol class="dd-list">
                                <li class="dd-item dd3-item" data-id="4">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Contrary to popular belief, Lorem Ipsum is not simply random text. </div>
                                </li>
                                <li class="dd-item dd3-item" data-id="5">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Lorem Ipsum is therefore always free from repetition, injected humour</div>
                                </li>
                                <li class="dd-item dd3-item" data-id="6">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">The standard chunk of Lorem Ipsum used since the 1500s</div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Sortable with Background</h2>
                <ul class="header-dropdown dropdown">                                
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu theme-bg">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="dd dd4">
                    <ol class="dd-list">
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle bg-blue">Lorem Ipsum is simply dummy text of the printing and typesetting industry.r</div>
                        </li>                                
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle bg-pink">Contrary to popular belief, Lorem Ipsum is not simply random text.</div>
                        </li>
                        <li class="dd-item" data-id="3">
                            <div class="dd-handle bg-green">Lorem Ipsum is therefore always free from repetition, injected humour</div>
                        </li>
                        <li class="dd-item" data-id="4">
                            <div class="dd-handle bg-indigo">The standard chunk of Lorem Ipsum used since the 1500s</div>
                        </li>
                        <li class="dd-item" data-id="5">
                            <div class="dd-handle bg-azura">It is a long established fact that a reader will be distracted by the readable</div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Sortable With Task List</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu theme-bg">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body todo_list">
                <div class="dd nestable-with-handle">
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" data-id="1">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked>
                                    <span>Lorem Ipsum is therefore always free from repetition, injected humour</span>
                                </label>
                            </div>
                        </li>
                        <li class="dd-item dd3-item" data-id="1">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>It is a long established fact that a reader will be distracted by the readable</span>
                                </label>
                            </div>
                        </li>
                        <li class="dd-item dd3-item" data-id="1">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                </label>
                            </div>
                        </li>
                        <li class="dd-item dd3-item" data-id="1">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>The standard chunk of Lorem Ipsum used since the 1500sm</span>
                                </label>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/nestable/jquery-nestable.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/nestable/jquery.nestable.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/ui/sortable-nestable.js') }}"></script>
@stop