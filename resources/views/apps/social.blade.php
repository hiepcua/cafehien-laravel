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
            <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Total Posts</p>
                    <h5 class="mb-0">132</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Total Feed</p>
                    <h5 class="mb-0">620</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">New Friends</p>
                    <h5 class="mb-0">541</h5>
                </div>
                <div class="mb-3 mb-xl-0 hidden-xs">
                    <p class="text-muted mb-1">Followers</p>
                    <h5 class="mb-0">12K</h5>                            
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix social">
    <div class="col-md-12">
        <div class="card">
            <div class="profile-header d-flex justify-content-between justify-content-center theme-bg">
                <div class="d-flex">
                    <div class="mr-3">
                        <img src="{{ asset('assets/images/user.png') }}" class="rounded" alt="">
                    </div>
                    <div class="details">
                        <h5 class="mb-0">Alan Green</h5>
                        <span class="text-light">Web Developer</span>
                        <p class="mb-0">795 Folsom Ave, Suite 600 San Francisco, 94107</p>
                    </div>                                
                </div>
                <div>
                    <button class="btn btn-default btn-sm">Edit</button>
                </div>
            </div>
            <ul class="nav nav-tabs4">
                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Feed">Feed</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Activity">Activity</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Friends">Friends</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane vivify fadeIn delay-100 active show" id="Feed">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="d-flex mb-3">
                                    <div class="icon bg-transparent">
                                        <img src="{{ asset('assets/images/user-small.png') }}" class="rounded-circle mr-3 w40" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Alan Green</h6>
                                        <span>UI director</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                </div>
                                <div class="align-right">
                                    <button class="btn btn-link"><i class="fa fa-paperclip text-muted"></i></button>
                                    <button class="btn btn-link"><i class="fa fa-camera text-muted"></i></button>
                                    <button class="btn btn-link"><i class="fa fa-print text-muted"></i></button>
                                    <button class="btn btn-primary theme-bg">Post</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="body">
                                <div class="d-flex mb-3">
                                    <div class="icon bg-transparent">
                                        <img src="{{ asset('assets/images/user-small.png') }}" class="rounded-circle mr-3 w40" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Alan Green</h6>
                                        <small>Sept 01, 2020</small>
                                    </div>
                                </div>                            
                                <div class="content">
                                    <img class="img-fluid rounded" src="{{ asset('assets/images/image-gallery/2.jpg') }}" alt="img">
                                    <h5 class="mt-3">All photographs are accurate</h5>
                                    <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:void(0);" class="mr-3"><i class="fa fa-thumbs-o-up font-14"></i> 10K Likes </a>
                                <a href="javascript:void(0);" class="mr-3"><i class="fa fa-comments font-14"></i> 92 Comments </a>
                                <a href="javascript:void(0);" ><i class="fa fa-share-alt font-14"></i> Share</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="body">
                                <div class="d-flex mb-3">
                                    <div class="icon bg-transparent">
                                        <img src="{{ asset('assets/images/user-small.png') }}" class="rounded-circle mr-3 w40" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Alan Green</h6>
                                        <small>Aug 27, 2020</small>
                                    </div>
                                </div>                            
                                <div class="content">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="img-fluid rounded" src="{{ asset('assets/images/image-gallery/5.jpg') }}" alt="img">
                                        </div>
                                        <div class="col-6">
                                            <img class="img-fluid rounded" src="{{ asset('assets/images/image-gallery/6.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <h5 class="mt-3">All photographs are accurate</h5>
                                    <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</span>
                                </div>
                            </div> 
                                <div class="card-footer">
                                <a href="javascript:void(0);" class="mr-3"><i class="fa fa-thumbs-o-up font-14"></i> 10K Likes </a>
                                <a href="javascript:void(0);" class="mr-3"><i class="fa fa-comments font-14"></i> 92 Comments </a>
                                <a href="javascript:void(0);" ><i class="fa fa-share-alt font-14"></i> Share</a>
                            </div>                               
                        </div>
                        <div class="card">
                            <div class="body">
                                <div class="d-flex mb-3">
                                    <div class="icon bg-transparent">
                                        <img src="{{ asset('assets/images/user-small.png') }}" class="rounded-circle mr-3 w40" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Alan Green</h6>
                                        <small>Sept 01, 2020</small>
                                    </div>
                                </div>
                                <div class="content">
                                    <img class="img-fluid rounded" src="{{ asset('assets/images/image-gallery/12.jpg') }}" alt="img">
                                    <h5 class="mt-3">All photographs are accurate</h5>
                                    <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:void(0);" class="mr-3"><i class="fa fa-thumbs-o-up font-14"></i> 10K Likes </a>
                                <a href="javascript:void(0);" class="mr-3"><i class="fa fa-comments font-14"></i> 92 Comments </a>
                                <a href="javascript:void(0);" ><i class="fa fa-share-alt font-14"></i> Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="row clearfix w_social3">
                            <div class="col-lg-6 col-6">
                                <div class="card facebook-widget">
                                    <div id="slider2" class="carousel slide vert" data-ride="carousel" data-interval="2000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="icon"><i class="fa fa-facebook"></i></div>
                                                <div class="content">
                                                    <div class="text">Like</div>
                                                    <div class="number">10K</div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-facebook"></i></div>
                                                <div class="content">
                                                    <div class="text">Comment</div>
                                                    <div class="number">217</div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-facebook"></i></div>
                                                <div class="content">
                                                    <div class="text">Share</div>
                                                    <div class="number">78</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                            
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="card instagram-widget">
                                    <div class="icon"><i class="fa fa-instagram"></i></div>
                                    <div class="content">
                                        <div class="text">Followers</div>
                                        <div class="number">231</div>
                                    </div>
                                </div>
                            </div>                                    
                            <div class="col-lg-6 col-6">
                                <div class="card google-widget">
                                    <div id="slider2" class="carousel slide vert" data-ride="carousel" data-interval="2000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="icon"><i class="fa fa-google"></i></div>
                                                <div class="content">
                                                    <div class="text">Like</div>
                                                    <div class="number">10K</div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-google"></i></div>
                                                <div class="content">
                                                    <div class="text">Comment</div>
                                                    <div class="number">217</div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-google"></i></div>
                                                <div class="content">
                                                    <div class="text">Share</div>
                                                    <div class="number">78</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="card twitter-widget">
                                    <div id="slider2" class="carousel slide vert" data-ride="carousel" data-interval="2000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="icon"><i class="fa fa-twitter"></i></div>
                                                <div class="content">
                                                    <div class="text">Followers</div>
                                                    <div class="number">10K</div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-twitter"></i></div>
                                                <div class="content">
                                                    <div class="text">Twitt</div>
                                                    <div class="number">657</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-value float-right text-warning"><i class="wi wi-day-cloudy"></i></div>
                                <h3 class="mb-1">18°C</h3>
                                <div>New York, USA</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>My Portfolio Status</h2>
                            </div>
                            <div class="body">
                                <ul class="list-unstyled">
                                    <li class="m-b-15">
                                        <div>Behance</div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                        </div>
                                    </li>
                                    <li class="m-b-15">
                                        <div>Photoshop</div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                        </div>
                                    </li>
                                    <li class="m-b-15">
                                        <div>Dribbble</div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                        </div>
                                    </li>
                                    <li class="m-b-15">
                                        <div>Pinterest</div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>Followers</h2>
                            </div>
                            <div class="body">
                                <ul class="right_chat w_followers list-unstyled mb-0">
                                    <li class="online">
                                        <a href="javascript:void(0);" class="media">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">@MelissaMcCoy</span>
                                                <span class="message">Designer, Blogger</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="online">
                                        <a href="javascript:void(0);" class="media">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">@Joge Lucky</span>
                                                <span class="message">Java Developer</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="offline">
                                        <a href="javascript:void(0);" class="media">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar3.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">@JuanMartinez</span>
                                                <span class="message">CEO, puffintheme</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="offline">
                                        <a href="javascript:void(0);" class="media">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">@Folisise Chosielie</span>
                                                <span class="message">Art director, Movie Cut</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="online">
                                        <a href="javascript:void(0);" class="media">
                                            <img class="media-object " src="{{ asset('assets/images/xs/avatar5.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">@LouisHenry</span>
                                                <span class="message">Writter, Mag Editor</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="offline">
                                        <a href="javascript:void(0);" class="media">
                                            <img class="media-object " src="{{ asset('assets/images/xs/avatar6.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">@Folisise Chosielie</span>
                                                <span class="message">Art director, Movie Cut</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="tab-pane vivify fadeIn delay-100" id="Activity">
                <div class="timeline">
                    <div class="timeline-item green vivify fadeIn">
                        <img src="{{ asset('assets/images/xs/avatar4.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded-circle">

                        <div class="d-flex align-items-center justify-content-between">
                            <span><a href="javascript:void(0);">Michelle Schultz</a> San Francisco, CA </span>
                            <small class="date font-12">20-04-2020 - Today</small>
                        </div>

                        <h6>Hello, What is Lorem Ipsum?</h6>
                        <div class="msg">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                    <div class="timeline-item pink vivify fadeIn">
                        <img src="{{ asset('assets/images/xs/avatar4.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded-circle">

                        <div class="d-flex align-items-center justify-content-between">
                            <span><a href="javascript:void(0);">Elizabeth Martin</a> Oakland, CA</span>
                            <small class="date font-12">20-04-2020 - Yesterday</small>
                        </div>

                        <h6>Hello Michelle, Where can I get some?</h6>
                        <div class="msg">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                            <img src="assets/images/image-gallery/1.jpg" class="rounded w100" alt="" />
                            <img src="assets/images/image-gallery/2.jpg" class="rounded w100" alt="" />
                            <img src="assets/images/image-gallery/3.jpg" class="rounded w100" alt="" />
                            <img src="assets/images/image-gallery/4.jpg" class="rounded w100" alt="" />
                        </div>
                    </div>
                    <div class="timeline-item orange vivify fadeIn">
                        <img src="{{ asset('assets/images/xs/avatar8.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded-circle">

                        <div class="d-flex align-items-center justify-content-between">
                            <span><a href="javascript:void(0);">Jason Porter</a> San Francisco, CA </span>
                            <small class="date font-12">20-04-2020 - Yesterday</small>
                        </div>

                        <h6>Hi, Where does it come from?</h6>
                        <div class="msg">
                            <p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane vivify fadeIn delay-100" id="Friends">
                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5 mb-0">
                        <tbody>
                            <tr>
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