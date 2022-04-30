@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Blog')


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
                    <p class="text-muted mb-1">Total Post</p>
                    <h5 class="mb-0">328</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">Share</p>
                    <h5 class="mb-0">12K</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">View</p>
                    <h5 class="mb-0">52K</h5>
                </div>
                <div class="mb-3 mb-xl-0">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#postNew">Post New</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-12">
        <div class="card-columns">
            <div class="card">
                <div id="slider1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('assets/images/image-gallery/1.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/images/image-gallery/2.jpg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/images/image-gallery/3.jpg') }}" alt="Third slide">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="javascript:void(0);">Card title that wraps to a new line</a></h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 13 mins ago</small></p>
                </div>
            </div>                        
            <div class="card n_category">
                <span class="sub_n_category bg-green">Photograph</span>
                <img class="card-img-top" src="{{ asset('assets/images/image-gallery/10.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="javascript:void(0);">'I cried when asked to be cover model'</a></h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 13 mins ago</small></p>
                </div>
            </div>
            <div class="card n_category text-center">
                <span class="sub_n_category bg-cyan">Travel</span>
                <img class="card-img" src="assets/images/news/news6.jpg" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title"><a href="javascript:void(0);">Wimbledon champion Kerber out of US Open</a></h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 15 mins ago</small></p>
                </div>
            </div>
            <div class="card text-white bg-purple">
                <div class="card-body">
                    <h5 class="card-title">Where does it come from?</h5>
                    <p class="card-text">Lana Del Rey postpones Israel performance Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.</p>
                    <p class="card-text"><small class="text-light">Last updated 13 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img" src="{{ asset('assets/images/image-gallery/11.jpg') }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Amazon Fashion</h5>
                    <p class="card-text">Your new look for the new season | Top brands | 30 days return</p>
                    <p class="card-text">Last updated 3 mins ago</p>
                </div>
            </div>
            <div class="card text-white bg-orange">
                <div class="card-body">
                    <h5 class="card-title">Where does it come from?</h5>
                    <p class="card-text">Lana Del Rey postpones Israel performance Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.</p>
                    <p class="card-text"><small class="text-light">Last updated 13 mins ago</small></p>
                </div>
            </div>
            <div class="card n_category">
                <span class="sub_n_category bg-red">Tech</span>
                <img class="card-img-top" src="{{ asset('assets/images/image-gallery/12.jpg') }}" alt="Card image cap">
                <div class="body">                            
                    <h5 class="mb-0 card-title"><a href="javascript:void(0);">Some quick example text to build on the card title.</a></h5>
                    <small>Feb 22, 10:47 am</small>
                </div>
            </div>
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Where does it come from?</h5>
                    <p class="card-text">Lana Del Rey postpones Israel performance Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.</p>
                    <p class="card-text"><small class="text-light">Last updated 13 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/images/news/news5.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="javascript:void(0);">'I cried when asked to be cover model'</a></h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card n_category">
                <span class="sub_n_category bg-pink">Fashion</span>
                <img class="card-img-top" src="{{ asset('assets/images/news/news8.jpg') }}" alt="Card image cap">
                <div class="body">                            
                    <h5 class="mb-0 card-title"><a href="javascript:void(0);">Some quick example text to build on the card title.</a></h5>
                    <small>Feb 22, 10:47 am</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top mb-3 rounded" src="{{ asset('assets/images/news/news10.jpg') }}" alt="Card image cap">
                    <h5 class="card-title"><a href="javascript:void(0);">Where can I get some?</a></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 1 week ago</small></p>
                </div>
            </div>                        
            <div class="card">
                <div class="card-body">
                    <div id="slider2" class="carousel vert slide" data-ride="carousel" data-interval="1700">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="javascript:void(0);" class="btn btn-primary theme-bg">Readmore</a>
                            </div>
                            <div class="carousel-item">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="javascript:void(0);" class="btn btn-primary theme-bg">Readmore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card n_category">
                <span class="sub_n_category bg-pink">Fashion</span>
                <img class="card-img-top" src="{{ asset('assets/images/news/news9.jpg') }}" alt="Card image cap">
                <div class="body">                            
                    <h5 class="mb-0 card-title"><a href="javascript:void(0);">Some quick example text to build on the card title.</a></h5>
                    <small>Feb 22, 10:47 am</small>
                </div>
            </div>
            <div class="card n_category text-center">
                <span class="sub_n_category bg-indigo">Style</span>
                <img class="card-img" src="{{ asset('assets/images/news/news7.jpg') }}" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title"><a href="javascript:void(0);">Wimbledon champion Kerber out of US Open</a></h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="postNew" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Add new blog</h5>
            </div>
            <div class="modal-body">
                <div class="form-group c_form_group">
                    <label>Blog Title</label>
                    <div class="form-line">
                        <input type="text" class="form-control" placeholder="Enter Title">
                    </div>
                </div>
                <div class="form-group c_form_group">
                    <label>Description</label>
                    <div class="form-line">
                        <textarea rows="4" class="form-control no-resize" placeholder="Enter Description..."></textarea>
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