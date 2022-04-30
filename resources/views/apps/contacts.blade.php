@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Contacts List')


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
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Total</p>
                    <h5 class="mb-0">561</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">Google</p>
                    <h5 class="mb-0">87</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">Invitations</p>
                    <h5 class="mb-0">13</h5>
                </div>
                <div class="mb-3 mb-xl-0">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addnote">Add New</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-12">
        <div class="card bg-clear">
            <div class="header">
                <ul class="nav nav-tabs3">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#All-Contacts">All</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Google-Contacts">Google</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Invitations-Contacts">Invitations</a></li>
                </ul>
                <ul class="header-dropdown dropdown">
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
                <div class="tab-content mt-0">
                    <div class="tab-pane show active" id="All-Contacts">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar1.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">Michelle Green</h6>
                                        <span>jason-porter@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-slack"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar2.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">Jason Porter</h6>
                                        <span>Carol@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-skype"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-dribbble"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar3.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">David Wallace</h6>
                                        <span>Michelle@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-slack"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar4.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">Michelle Green</h6>
                                        <span>jason-porter@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-slack"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar5.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">Michelle Green</h6>
                                        <span>jason-porter@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-slack"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar6.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">Michelle Green</h6>
                                        <span>jason-porter@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar7.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">Sean Black</h6>
                                        <span>jason-porter@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-slack"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card contact_card">
                                    <div class="header">
                                        <ul class="header-dropdown dropdown">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                <ul class="dropdown-menu theme-bg">
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                                    <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body text-center">
                                        <div class="circle">
                                            <img class="rounded-circle" src="{{ asset('assets/images/sm/avatar8.jpg') }}" alt="">
                                        </div>
                                        <h6 class="mt-3 mb-0">David Wallace</h6>
                                        <span>jason-porter@info.com</span>
                                        <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-flickr"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-dropbox"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-apple"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                        <button class="btn btn-default btn-sm">Follow</button>
                                        <button class="btn btn-default btn-sm">Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Google-Contacts">
                        <div class="form-group c_form_group bg-white">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search here...">
                                <div class="input-group-append"><button class="btn btn-primary btn-sm theme-bg" type="button">Search</button></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5 mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </th>
                                        <th>#</th>
                                        <th></th>
                                        <th>eMail</th>
                                        <th>Address</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Jason Porter</a>
                                            <p class="mb-0">+ 264-625-5858</p>
                                        </td>
                                        <td>
                                            <span>jason-porter@example.com</span>
                                        </td>
                                        <td>
                                            <span>123 6th St. Melbourne, FL 32904</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Denise Elliott</a>
                                            <p class="mb-0">+ 264-625-4523</p>
                                        </td>
                                        <td>
                                            <span>denise-elliott@example.com</span>
                                        </td>
                                        <td>
                                            <span>514 S. Magnolia St. Orlando, FL 32806</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar3.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Rose Coke</a>
                                            <p class="mb-0">+ 264-625-2583</p>
                                        </td>
                                        <td>
                                            <span>rose-coke@example.com</span>
                                        </td>
                                        <td>
                                            <span>44 Shirley Ave. West Chicago, IL 60185</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar4.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Grace Knight</a>
                                            <p class="mb-0">+ 264-625-2583</p>
                                        </td>
                                        <td>
                                            <span>grace-knight@example.com</span>
                                        </td>
                                        <td>
                                            <span>70 Bowman St. South Windsor, CT 06074</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar5.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Elizabeth Martin</a>
                                            <p class="mb-0">+ 264-625-2341</p>
                                        </td>
                                        <td>
                                            <span>Elizabeth-Martin@example.com</span>
                                        </td>
                                        <td>
                                            <span>123 6th St. Melbourne, FL 32904</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar6.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Denise Alvarado</a>
                                            <p class="mb-0">+ 264-625-7262</p>
                                        </td>
                                        <td>
                                            <span>denise-Alvarado@example.com</span>
                                        </td>
                                        <td>
                                            <span>514 S. Magnolia St. Orlando, FL 32806</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar7.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Terry Carter</a>
                                            <p class="mb-0">+ 264-625-9283</p>
                                        </td>
                                        <td>
                                            <span>Carol-coke@example.com</span>
                                        </td>
                                        <td>
                                            <span>44 Shirley Ave. West Chicago, IL 60185</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fancy-checkbox mr-0">
                                                <label class="mb-0"><input type="checkbox"><span></span></label>
                                            </div>
                                        </td>
                                        <td class="w60">
                                            <img src="{{ asset('assets/images/xs/avatar8.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="">Michelle Schultz</a>
                                            <p class="mb-0">+ 264-625-2233</p>
                                        </td>
                                        <td>
                                            <span>Michelle-Schultz@example.com</span>
                                        </td>
                                        <td>
                                            <span>70 Bowman St. South Windsor, CT 06074</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary theme-bg btn-sm">Follow</button>
                                            <button class="btn btn-dark btn-sm">Message</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="Invitations-Contacts">
                        <h2>No Invitations</h2>
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
@stop