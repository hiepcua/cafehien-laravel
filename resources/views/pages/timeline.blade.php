@extends('layout.master')
@section('parentPageTitle', 'Pages')
@section('title', 'Timeline')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{route('pages.settings')}}" class="btn btn-default">Settings</a>
            <a href="javascript:void(0);" class="btn btn-dark">Buy this item</a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="timeline">
                    <div class="timeline-item">
                        <img class="rounded-circle w30" src="{{ asset('assets/images/xs/avatar1.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        <h6><span>Jason Porter</span>, shared a twitt <small class="float-right text-muted font-12">Tue 8:17pm</small></h6>
                        <div class="msg">
                            <article class="media mb-0">
                                <div class="mr-3">
                                    <img class="rounded-circle mr-3" src="{{ asset('assets/images/xs/avatar6.jpg') }}" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="content">
                                        <p class="h5">John Smith <small>@johnsmith</small> <small class="float-right text-muted font-14">31 minutes ago</small></p>
                                        <p>Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.</p>
                                    </div>
                                    <nav class="d-flex text-muted">
                                        <a href="javascript:void(0);" class="icon mr-3"><i class="fa fa-repeat"></i></a>
                                        <a href="javascript:void(0);" class="icon mr-3"><i class="fa fa-twitter"></i> 24</a>
                                        <a href="javascript:void(0);" class="icon mr-3"><i class="fa fa-heart"></i> 43</a>
                                        <a href="javascript:void(0);" class="text-muted ml-auto">5 notes</a>
                                    </nav>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <img class="rounded-circle w30" src="{{ asset('assets/images/xs/avatar2.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        <h6><span>Elizabeth Martin</span>, attached file <small class="float-right text-muted font-12">Tue 8:17pm</small></h6>
                        <div class="msg">
                            <div class="file_folder">
                                <a href="javascript:void(0);">
                                    <div class="icon">
                                        <i class="fa fa-file-word-o text-blue"></i>
                                    </div>
                                    <div class="file-name">
                                        <p class="mb-0 text-muted">finame12.doc</p>
                                        <small>56KB</small>
                                    </div>
                                </a>
                                <a href="javascript:void(0);">
                                    <div class="icon">
                                        <i class="fa fa-file-pdf-o text-danger"></i>
                                    </div>
                                    <div class="file-name">
                                        <p class="mb-0 text-muted">filename-report.pdf</p>
                                        <small>2MB</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <img class="rounded-circle w30" src="{{ asset('assets/images/xs/avatar3.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        <h6><span>Rose Coke</span>, Upload new photos <small class="float-right text-muted font-12">Tue 8:17pm</small></h6>
                        <div class="msg">
                            <p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                            <div class="mt-2">
                                <img class="w100" src="{{ asset('assets/images/image-gallery/1.jpg') }}" alt="">
                                <img class="w100" src="{{ asset('assets/images/image-gallery/2.jpg') }}" alt="">
                                <img class="w100" src="{{ asset('assets/images/image-gallery/3.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <img class="rounded-circle w30" src="{{ asset('assets/images/xs/avatar6.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        <h6><span>Elizabeth Martin</span>, commit code in GitHub <small class="float-right text-muted font-12">Tue 8:17pm</small></h6>
                        <div class="msg">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            <p>making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <img class="rounded-circle w30" src="{{ asset('assets/images/xs/avatar6.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        <h6><span>Elizabeth Martin</span>, shared video <small class="float-right text-muted font-12">Tue 8:17pm</small></h6>
                        <div class="msg">
                            <iframe width="420" height="250" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <img class="rounded-circle w30" src="{{ asset('assets/images/xs/avatar5.jpg') }}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar">
                        <h6><span>Denise Elliott</span> shared files <small class="float-right text-muted font-12">Tue 8:17pm</small></h6>
                        <div class="msg">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                            <ul class="list-unstyled">
                                <li>College in Virginia, looked up one of the more obscure Latin words</li>
                                <li>classical <a href="javascript:void(0);">Latin literature</a> from 45 BC, making it over 2000 years old</li>
                                <li>going to use a passage of Lorem Ipsum, you need</li>
                                <li>ombined with a handful of model sentence </li>
                            </ul>
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

@stop