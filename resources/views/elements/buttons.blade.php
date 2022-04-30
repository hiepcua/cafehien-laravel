@extends('layout.master')
@section('parentPageTitle', 'Elements')
@section('title', 'Buttons UI')


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
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Buttons<small>You can use classes which names are <code>.btn .btn-primary .disabled .btn-outline-primary</code></small></h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                            <code>.btn .btn-primary</code><br>
                            <button type="button" class="btn btn-primary theme-bg">Primary</button>
                        </div>                                    
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-default</code><br>
                        <button type="button" class="btn btn-default">Secondary</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-success</code><br>
                        <button type="button" class="btn btn-success">Success</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-danger</code><br>
                        <button type="button" class="btn btn-danger">Danger</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-warning</code><br>
                        <button type="button" class="btn btn-warning">Warning</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-info</code><br>
                        <button type="button" class="btn btn-info">Info</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-light</code><br>
                        <button type="button" class="btn btn-light">Light</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-dark</code><br>
                        <button type="button" class="btn btn-dark">Dark</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-link</code><br>
                        <button type="button" class="btn btn-link">Link</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <h6>Buttons Rounded</h6>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                            <code>.btn .btn-primary .btn-round</code><br>
                            <button type="button" class="btn btn-primary theme-bg btn-round">Primary</button>
                        </div>                                    
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-default .btn-round</code><br>
                        <button type="button" class="btn btn-default btn-round">Secondary</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-success .btn-round</code><br>
                        <button type="button" class="btn btn-success btn-round">Success</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-danger .btn-round</code><br>
                        <button type="button" class="btn btn-danger btn-round">Danger</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-warning .btn-round</code><br>
                        <button type="button" class="btn btn-warning btn-round">Warning</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-info .btn-round</code><br>
                        <button type="button" class="btn btn-info btn-round">Info</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-light .btn-round</code><br>
                        <button type="button" class="btn btn-light btn-round">Light</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-dark .btn-round</code><br>
                        <button type="button" class="btn btn-dark btn-round">Dark</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <h6>Disabled State</h6>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-primary .disabled</code><br>
                        <button type="button" class="btn btn-primary theme-bg disabled">Primary</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-default .disabled</code><br>
                        <button type="button" class="btn btn-default disabled">Secondary</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-success .disabled</code><br>
                        <button type="button" class="btn btn-success disabled">Success</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-danger .disabled</code><br>
                        <button type="button" class="btn btn-danger disabled">Danger</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-warning .disabled</code><br>
                        <button type="button" class="btn btn-warning disabled">Warning</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-info .disabled</code><br>
                        <button type="button" class="btn btn-info disabled">Info</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-light .disabled</code><br>
                        <button type="button" class="btn btn-light disabled">Light</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-dark .disabled</code><br>
                        <button type="button" class="btn btn-dark disabled">Dark</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-link .disabled</code><br>
                        <button type="button" class="btn btn-link disabled">Link</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <h6>Outline buttons</h6>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-primary</code><br>
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-secondary</code><br>
                        <button type="button" class="btn btn-outline-secondary">Secondary</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-success</code><br>
                        <button type="button" class="btn btn-outline-success">Success</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-danger</code><br>
                        <button type="button" class="btn btn-outline-danger">Danger</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-warning</code><br>
                        <button type="button" class="btn btn-outline-warning">Warning</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-info</code><br>
                        <button type="button" class="btn btn-outline-info">Info</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-light</code><br>
                        <button type="button" class="btn btn-outline-light">Light</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-2">
                        <code>.btn .btn-outline-dark</code><br>
                        <button type="button" class="btn btn-outline-dark">Dark</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Button tags</h2>
            </div>
            <div class="body">
                <a class="btn btn-primary theme-bg" href="javascript:void(0);" role="button">Link</a>
                <button class="btn btn-primary theme-bg" type="submit">Button</button>
                <input class="btn btn-primary theme-bg" type="button" value="Input">
                <input class="btn btn-primary theme-bg" type="submit" value="Submit">
                <input class="btn btn-primary theme-bg" type="reset" value="Reset">
            </div>
        </div>
    </div>                
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Button group</h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="btn-group mb-3">
                            <button type="button" class="btn btn-default">Left</button>
                            <button type="button" class="btn btn-default">Middle</button>
                            <button type="button" class="btn btn-default">Right</button>
                        </div>
                        <h6>Button toolbar</h6>
                        <div class="btn-toolbar mb-3">
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-default">1</button>
                                <button type="button" class="btn btn-default">2</button>
                                <button type="button" class="btn btn-default">3</button>
                                <button type="button" class="btn btn-default">4</button>
                            </div>
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-default">5</button>
                                <button type="button" class="btn btn-default">6</button>
                                <button type="button" class="btn btn-default">7</button>
                            </div>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-default">8</button>
                            </div>
                        </div>
                        <hr>
                        <div class="btn-toolbar mb-3">
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-default">1</button>
                                <button type="button" class="btn btn-default">2</button>
                                <button type="button" class="btn btn-default">3</button>
                                <button type="button" class="btn btn-default">4</button>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon">@</div>
                                </div>
                                <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon">
                            </div>
                        </div>
                        <h6>Nesting</h6>
                        <div class="btn-group mb-3">
                            <button type="button" class="btn btn-default">1</button>
                            <button type="button" class="btn btn-default">2</button>
                            
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
                                <a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h6>Different Sizing</h6>
                        <div class="btn-group btn-group-lg">
                            <button type="button" class="btn btn-default">Left</button>
                            <button type="button" class="btn btn-default">Middle</button>
                            <button type="button" class="btn btn-default">Right</button>
                        </div>
                        <br><br>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">Left</button>
                            <button type="button" class="btn btn-default">Middle</button>
                            <button type="button" class="btn btn-default">Right</button>
                        </div>
                        <br><br>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-default">Left</button>
                            <button type="button" class="btn btn-default">Middle</button>
                            <button type="button" class="btn btn-default">Right</button>
                        </div>
                    </div>
                </div>                            
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <button type="button" class="btn btn-default mb-2"><i class="fa fa-plus-square"></i> <span>Default</span></button>
                <button type="button" class="btn btn-primary theme-bg mb-2"><i class="fa fa-refresh"></i> <span>Primary</span></button>
                <button type="button" class="btn btn-info mb-2"><i class="fa fa-info-circle"></i> <span>Info</span></button>
                <button type="button" class="btn btn-primary theme-bg mb-2" disabled="disabled"><i class="fa fa-refresh fa-spin"></i> <span>Refreshing...</span></button>
                <button type="button" class="btn btn-success mb-2"><i class="fa fa-check-circle"></i> <span>Success</span></button>
                <button type="button" class="btn btn-warning mb-2"><i class="fa fa-warning"></i> <span>Warning</span></button>
                <button type="button" class="btn btn-danger mb-2"><i class="fa fa-trash-o"></i> <span>Danger</span></button>
                <button type="button" class="btn btn-primary theme-bg mb-2" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span>Loading...</span></button>
                <br>
                <button type="button" class="btn btn-danger mb-2"><i class="fa fa-heart"></i> <span>Love</span></button>
                <button type="button" class="btn btn-danger mb-2"><span>Love</span> <i class="fa fa-heart"></i></button>
                <button type="button" class="btn btn-danger mb-2"><span class="sr-only">Love</span> <i class="fa fa-heart"></i></button>
                <button type="button" class="btn btn-default mb-2" title="Refresh"><span class="sr-only">Refresh</span> <i class="fa fa-refresh"></i></button>
                <button type="button" class="btn btn-default mb-2" title="Copy"><span class="sr-only">Copy</span> <i class="fa fa-files-o"></i></button>
                <button type="button" class="btn btn-success mb-2" title="Save"><span class="sr-only">Save</span> <i class="fa fa-save"></i></button>
                <button type="button" class="btn btn-danger mb-2" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
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