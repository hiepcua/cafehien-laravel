@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Todo List')


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
                <div class="mb-3 mb-xl-0">
                    <a href="{{route('pages.settings')}}" class="btn btn-default">Settings</a>
                    <a href="javascript:void(0);" class="btn btn-dark">Buy this item</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-12">
        <div class="card bg-clear">
            <nav class="navbar navbar-expand-lg navbar-light bg-light page_menu">
                <a class="navbar-brand" href="javascript:void(0);">M.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-muted"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="app-todo.html">ToDo List</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Done</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Important</a></li>                                
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Trash</a></li>                                
                    </ul>

                    <div class="ml-auto">
                        <button type="button" class="btn btn-primary theme-bg" data-toggle="modal" data-target="#addtodo">Add Todo</button>
                    </div>
                </div>
            </nav>
            <div class="body">
                <ul class="todo_list list-unstyled">
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>
                                <div class="d-flex justify-content-between">
                                    <span class="font-18 mb-1">Product Event at New York</span>
                                    <a href="javascript:void(0);" class="text-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <small class="font-12 text-muted">March, 07 2020</small>
                                <p class="mb-0">Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                            </span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>
                                <div class="d-flex justify-content-between">
                                    <span class="font-18 mb-1">Meeting with Team for new project</span>
                                    <a href="javascript:void(0);" class="text-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <small class="font-12 text-muted">March, 07 2020</small>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat.</p>
                            </span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>
                                <div class="d-flex justify-content-between">
                                    <span class="font-18 mb-1">Meeting with Team for new project</span>
                                    <a href="javascript:void(0);" class="text-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <small class="font-12 text-muted">March, 07 2020</small>
                                <p class="mb-0">Suspendisse ac turpis dictum, convallis est ut, posuere sem.</p>
                            </span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>
                                <div class="d-flex justify-content-between">
                                    <span class="font-18 mb-1">New User Registered</span>
                                    <a href="javascript:void(0);" class="text-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <small class="font-12 text-muted">March, 07 2020</small>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat.</p>
                            </span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>
                                <div class="d-flex justify-content-between">
                                    <span class="font-18 mb-1">Conference call with Marketing Manager</span>
                                    <a href="javascript:void(0);" class="text-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <small class="font-12 text-muted">March, 07 2020</small>
                                <p class="mb-0">Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>
                                <div class="d-flex justify-content-between">
                                    <span class="font-18 mb-1">Download Complete</span>
                                    <a href="javascript:void(0);" class="text-danger"><i class="fa fa-trash"></i></a>
                                </div>
                                <small class="font-12 text-muted">March, 07 2020</small>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat.</p>
                            </span>
                        </label>
                    </li>
                </ul>                            
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="addtodo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Add Todo</h5>
            </div>
            <div class="modal-body">
                <div class="form-group c_form_group">
                    <label>Todo Title</label>
                    <div class="form-line">
                        <input type="text" class="form-control" placeholder="Todo Title">
                    </div>
                </div>
                <div class="form-group c_form_group">
                    <label>Description</label>
                    <div class="form-line">
                        <textarea rows="4" class="form-control no-resize" placeholder="Todo Description..."></textarea>
                    </div>
                </div>       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary theme-bg">Add</button>
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
@stop