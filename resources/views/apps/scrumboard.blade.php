@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Scrum Board')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">New task</p>
                    <h5 class="mb-0">12</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">In progress</p>
                    <h5 class="mb-0">23</h5>
                </div>
                <div class="mb-3 mb-xl-0">
                    <p class="text-muted mb-1">Complete</p>
                    <h5 class="mb-0">102</h5>
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
                    <li class="nav-item active"><a class="nav-link" href="javascript:void(0);">Design</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Development</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Marketing</a></li>
                </ul>

                <div class="ml-auto">
                    <button type="button" class="btn btn-default change_view">List view</button>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#CreateTask">Create task</button>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-12">                    
        <div class="card">
            <div class="body">
                <div class="scrum-body">
                    <div class="scrum-board create">
                        <h5>Create new</h5>
                        <div class="scrum-board-column" ondrop="drop(event)" ondragover="dragover(event)" id="backlog">
                            <div class="scrum-task overflow" draggable="true" ondragstart="dragstart(event)" id="123" ondragend="dragend(event)">
                                <span>Create new chat app</span>
                                <div class="st-description">Contrary to popular belief, Lorem Ipsum is not simply random text.</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="st-date">Due 20/04/2020</div>
                                    <div class="st-assignee"><span class="assignee">GH</span></div>
                                </div>
                            </div>                                    
                            <div class="scrum-task overflow" draggable="true" ondragstart="dragstart(event)" id="89" ondragend="dragend(event)">
                                <span>Redesign store in FIGMA</span>
                                <div class="st-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="st-date">Due 20/04/2020</div>
                                    <div class="st-assignee"><span class="assignee">KL</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="scrum-board in-progress">
                        <h5>In progress</h5>
                        <div class="scrum-board-column" ondrop="drop(event)" ondragover="dragover(event)" id="in-progress">
                            <div class="scrum-task overflow" draggable="true" ondragstart="dragstart(event)" id="423" ondragend="dragend(event)">
                                <span>Android app design</span>
                                <div class="st-description">The point of using Lorem Ipsum is that it has a more-or-less normal distribution</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="st-date">Due 20/04/2020</div>
                                    <div class="st-assignee"><span class="assignee">RM</span></div>
                                </div>
                            </div>
                            <div class="scrum-task overflow" draggable="true" ondragstart="dragstart(event)" id="761" ondragend="dragend(event)">
                                <span>iOS food app design</span>
                                <div class="st-description">All the Lorem Ipsum generators on the Internet</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="st-date">Due 20/04/2020</div>
                                    <div class="st-assignee"><span class="assignee">RM</span></div>
                                </div>
                            </div>
                            <div class="scrum-task overflow" draggable="true" ondragstart="dragstart(event)" id="612" ondragend="dragend(event)">
                                <span>Webapp design in FIGMA</span>
                                <div class="st-description">All the Lorem Ipsum generators on the Internet</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="st-date">Due 20/04/2020</div>
                                    <div class="st-assignee"><span class="assignee">RM</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="scrum-board done">
                        <h5>Done</h5>
                        <div class="scrum-board-column" ondrop="drop(event)" ondragover="dragover(event)" id="done">
                            <div class="scrum-task overflow" draggable="true" ondragstart="dragstart(event)" id="12" ondragend="dragend(event)">
                                <span>OnePage landing</span>
                                <div class="st-description">It has survived not only five centuries</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="st-date">Due 20/04/2019</div>
                                    <div class="st-assignee"><span class="assignee">AK</span></div>
                                </div>
                            </div>
                            <div class="scrum-task overflow" draggable="true" ondragstart="dragstart(event)" id="87" ondragend="dragend(event)">
                                <span>Marketing Logo design</span>
                                <div class="st-description">It was popularised in the 1960s with the release of Letraset sheets</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="st-date">Due 20/04/2019</div>
                                    <div class="st-assignee"><span class="assignee">AS</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="CreateTask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Create task</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group c_form_group">
                            <label>Task title</label>
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Enter task title">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group c_form_group">
                            <label>Assignee to</label>
                            <select class="form-control">
                                <option>Select</option>
                                <option>Jason Porter</option>
                                <option>Denise Elliott</option>
                                <option>Rose Coke</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group c_form_group">
                            <label>Due date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Select due date">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group c_form_group">
                            <label>Description</label>
                            <div class="form-line">
                                <textarea rows="4" class="form-control no-resize" placeholder="Task description..."></textarea>
                            </div>
                        </div>
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
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('page-script')
<script>
    
    $('.change_view').on('click', function() {
		$('.scrum-body').toggleClass('list');
    });

    $(window).on('load resize', function() {
		if($(window).innerWidth() < 992) {
			$('.scrum-body').addClass('list');
		} else {
			$('.scrum-body').removeClass('list');
		}
	});
    

    function dragover(ev) {
        ev.preventDefault();
        ev.dataTransfer.dropEffect = "move";
    }

    function dragLeave(e) {
    }

    function dragstart(ev) {
        ev.dataTransfer.setData("text/plain", ev.target.id);
        ev.dataTransfer.effectAllowed = "move";
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.closest('.scrum-board-column').appendChild(document.getElementById(data));
    }
</script>
@stop