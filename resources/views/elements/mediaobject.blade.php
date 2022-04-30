@extends('layout.master')
@section('parentPageTitle', 'Elements')
@section('title', 'Media Groups')


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
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Default Media</h2>
            </div>
            <div class="body">
                <div class="media mleft">
                    <div class="media-left"><a href="javascript:void(0);"><img class="media-object rounded" src="{{ asset('assets/images/sm/avatar1.jpg') }}" width="64" height="64" alt=""></a></div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                        ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                        turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                        in faucibus.
                    </div>
                </div>
                <div class="media mleft">
                    <div class="media-left"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="{{ asset('assets/images/sm/avatar2.jpg') }}" width="64" height="64"></a></div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                        ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                        turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                        in faucibus.
                        <div class="media m-t-20">
                            <div class="media-left"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="{{ asset('assets/images/sm/avatar3.jpg') }}" width="64" height="64"></a></div>
                            <div class="media-body">
                                <h4 class="media-heading">Nested media heading</h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla
                                vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                                fringilla. Donec lacinia congue felis in faucibus. </div>
                        </div>
                    </div>
                </div>
                <div class="media mright">
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                        ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                        turpis. </div>
                    <div class="media-right"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="{{ asset('assets/images/sm/avatar4.jpg') }}" width="64" height="64"></a></div>
                </div>
                <div class="media mleft">
                    <div class="media-left"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="{{ asset('assets/images/sm/avatar5.jpg') }}" width="64" height="64"></a></div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                        ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                        turpis. </div>
                    <div class="media-right"><a href="javascript:void(0);"><img class="media-object rounded" src="{{ asset('assets/images/sm/avatar6.jpg') }}" width="64" height="64"></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Media Alignment</h2>
            </div>
            <div class="body">
                <div class="bs-example" data-example-id="media-alignment">
                    <div class="media">
                        <div class="media-left"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="{{ asset('assets/images/sm/avatar1.jpg') }}" width="64" height="64"></a></div>
                        <div class="media-body">
                            <h4 class="media-heading">Top aligned media</h4>
                            <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus. </p>
                            <p> Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis
                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left media-middle"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="{{ asset('assets/images/sm/avatar7.jpg') }}" width="64" height="64"></a></div>
                        <div class="media-body">
                            <h4 class="media-heading">Middle aligned media</h4>
                            <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus. </p>
                            <p> Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis
                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left media-bottom"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="{{ asset('assets/images/sm/avatar8.jpg') }}" width="64" height="64"></a></div>
                        <div class="media-body">
                            <h4 class="media-heading">Bottom aligned media</h4>
                            <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus. </p>
                            <p> Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis
                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
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