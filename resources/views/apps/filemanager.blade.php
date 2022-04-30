@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'File Manager')


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
                    <h5 class="mb-0">2 TB</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Folder</p>
                    <h5 class="mb-0">325</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">File</p>
                    <h5 class="mb-0">17K</h5>
                </div>
                <div class="mb-3 mb-xl-0">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addnote">Create New</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-12">
                        <h5 class="mb-0">Google drive</h5>
                        <small class="info">15 GB ( Basic Plan )</small>
                    </div>
                    <div class="col-12">
                        <div class="progress progress-xs progress-transparent mb-0 mt-3">
                            <div class="progress-bar bg-green" data-transitiongoal="87" style="width: 87%;" aria-valuenow="87"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-12">
                        <h5 class="mb-0">Dropbox</h5>
                        <small class="info">2 GB ( Free Plan )</small>
                    </div>
                    <div class="col-12">                                    
                        <div class="progress progress-xs progress-transparent mb-0 mt-3">
                            <div class="progress-bar bg-info" data-transitiongoal="33" style="width: 33%;" aria-valuenow="33"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-12">
                        <h5 class="mb-0">OneDrive</h5>
                        <small class="info">1 TB ( Ragular Plan )</small>
                    </div>
                    <div class="col-12">                                    
                        <div class="progress progress-xs progress-transparent mb-0 mt-3">
                            <div class="progress-bar bg-blue" data-transitiongoal="21" style="width: 21%;" aria-valuenow="21"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-12">
                        <h5 class="mb-0">FTP Drive</h5>
                        <small class="info">30 GB ( Regular plan )</small>
                    </div>
                    <div class="col-12">                                    
                        <div class="progress progress-xs progress-transparent mb-0 mt-3">
                            <div class="progress-bar bg-red" data-transitiongoal="21" style="width: 21%;" aria-valuenow="21"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-12">
        <div class="card">
            <div class="header">
                <h2>Folder</h2>
            </div>
            <div class="body">
                <div class="file_folder">
                    <a href="javascript:void(0);">
                        <div class="icon">
                            <i class="fa fa-folder text-muted"></i>
                        </div>
                        <div class="file-name">
                            <p class="mb-0 text-muted">Analytics</p>
                            <small>215 File, 50MB</small>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                        <div class="icon">
                            <i class="fa fa-folder text-muted"></i>
                        </div>
                        <div class="file-name">
                            <p class="mb-0 text-muted">Assets</p>
                            <small>815 File, 1.2GB</small>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                        <div class="icon">
                            <i class="fa fa-folder text-red"></i>
                        </div>
                        <div class="file-name">
                            <p class="mb-0 text-muted">Marketing</p>
                            <small>23 File, 22MB</small>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                        <div class="icon">
                            <i class="fa fa-folder text-info"></i>
                        </div>
                        <div class="file-name">
                            <p class="mb-0 text-muted">Web Project</p>
                            <small>67 File, 92MB</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="section_title">
            <div class="mr-3">
                <h3>Recently Accessed Files</h3>
                <small>Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...</small>
            </div>
            <div>
                <div class="btn-group mb-3">
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">All Accessed</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);">Folder</a>
                            <a class="dropdown-item" href="javascript:void(0);">File</a>
                            <a class="dropdown-item" href="javascript:void(0);">PDF</a>
                            <a class="dropdown-item" href="javascript:void(0);">Doc file</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default"><i class="fa fa-trash"></i> <span class="hidden-md">Recycle bin</span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover table_custom text-nowrap spacing5 mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Share With</th>
                                <th>Owner</th>
                                <th>Last Update</th>
                                <th class="text-right">Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-folder"></i>
                                </td>
                                <td>
                                    <span class="folder-name">Work</span>
                                </td>
                                <td>
                                    <div class="avatar-list avatar-list-stacked">
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar1.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar3.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                    </div>
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>Oct 7, 2018</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> - </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-folder"></i>
                                </td>
                                <td>
                                    <span class="folder-name">Family</span>
                                </td>
                                <td>
                                    -
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>Oct 17, 2018</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> - </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-folder text-danger"></i>
                                </td>
                                <td>
                                    <span class="folder-name">Holidays</span>
                                </td>
                                <td>
                                    -
                                </td>
                                <td class="w100">
                                    <span>John</span>
                                </td>
                                <td class="w100">
                                    <span>Oct 18, 2018</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> 50MB </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-folder"></i>
                                </td>
                                <td>
                                    <span class="folder-name">Mobile Work </span>
                                </td>
                                <td>
                                    -
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>April 7, 2019</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> 1GB </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-folder"></i>
                                </td>
                                <td>
                                    <span class="folder-name">Photoshop Data</span>
                                </td>
                                <td>
                                    <div class="avatar-list avatar-list-stacked">
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar5.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar6.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                    </div>
                                </td>
                                <td class="w100">
                                    <span>Andrew</span>
                                </td>
                                <td class="w100">
                                    <span>Nov 23, 2019</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> - </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-folder text-danger"></i>
                                </td>
                                <td>
                                    <span class="folder-name">Holidays</span>
                                </td>
                                <td>
                                    <div class="avatar-list avatar-list-stacked">
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar8.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar7.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar1.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                        <img class="avatar avatar-sm" src="{{ asset('assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip" title="Avatar"/>
                                    </div>
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>Dec 5, 2018</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> 100MB </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-file-excel-o text-success"></i>
                                </td>
                                <td>
                                    <span class="folder-name">new timesheet.xlsx</span>
                                </td>
                                <td>
                                    -
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>Dec 5, 2018</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> 52KB </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-file-word-o text-warning"></i>
                                </td>
                                <td>
                                    <span class="folder-name">new project.doc</span>
                                </td>
                                <td>
                                    -
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>May 5, 2019</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> 152KB </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-file-pdf-o text-warning"></i>
                                </td>
                                <td>
                                    <span class="folder-name">report.pdf</span>
                                </td>
                                <td>
                                    -
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>May 2, 2019</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> 841KB </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <i class="fa fa-file-pdf-o text-warning"></i>
                                </td>
                                <td>
                                    <span class="folder-name">report-2018.pdf</span>
                                </td>
                                <td>
                                    -
                                </td>
                                <td class="w100">
                                    <span>Me</span>
                                </td>
                                <td class="w100">
                                    <span>Oct 16, 2018</span>
                                </td>
                                <td class="text-right">
                                    <span class="size"> 541KB </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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