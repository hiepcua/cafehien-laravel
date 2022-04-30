@extends('layout.master')
@section('parentPageTitle', 'Elements')
@section('title', 'Tabs')


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
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Bootstrap Simple Example Tab</h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show vivify fadeIn active" id="Home">
                        <h6>Home</h6>
                        <p>Raw denim you master cleanse. keffiyeh dreamcatcher synth. placeat salvia cillum iphan american apparel, butcher voluptate nisi qui.</p>
                    </div>
                    <div class="tab-pane vivify fadeIn" id="Profile">
                        <h6>Profile</h6>
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's  gluten-free, carles pitchfork biodiesel fixie.</p>
                    </div>
                    <div class="tab-pane vivify fadeIn" id="Contact">
                        <h6>Contact</h6>
                        <p>Food truck fixie locavore, accusamus mcsweeney's rud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS.</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <small>Takes the basic nav from above and adds the <code class="highlighter-rouge">.nav-tabs</code> class to generate a tabbed interface. Use them to create tabbable regions with our <a href="#javascript-behavior">tab JavaScript plugin</a>.</small>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Tabs With Icon</h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-withicon"><i class="fa fa-home"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-withicon"><i class="fa fa-user"></i> Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-withicon"><i class="fa fa-vcard"></i> Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="Home-withicon">
                        <h6>Home</h6>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
                    </div>
                    <div class="tab-pane" id="Profile-withicon">
                        <h6>Profile</h6>
                        <p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)</p>
                    </div>
                    <div class="tab-pane" id="Contact-withicon">
                        <h6>Contact</h6>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Tabs With Only Icon Title</h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-icon"><i class="fa fa-home"></i></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-icon"><i class="fa fa-user"></i></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-icon"><i class="fa fa-vcard"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="Home-icon">
                        <h6>Home</h6>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                    <div class="tab-pane" id="Profile-icon">
                        <h6>Profile</h6>
                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                    </div>
                    <div class="tab-pane" id="Contact-icon">
                        <h6>Contact</h6>
                        <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Tabs with dropdowns</h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Active">Active </a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);">Action</a>
                            <a class="dropdown-item" href="javascript:void(0);">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0);">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0);">Separated link</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Link</a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="javascript:void(0);">Disabled</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="Active">
                        <h6>Home</h6>
                        <p>Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Tab example 2 <small><code class="highlighter-rouge">.nav-tabs2</code></small></h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs2">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-new">Home</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-new">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-new">Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show vivify flipInX active" id="Home-new">
                        <h6>Home</h6>
                        <p>master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate qui.</p>
                    </div>
                    <div class="tab-pane vivify flipInX" id="Profile-new">
                        <h6>Profile</h6>
                        <p>ck lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel </p>
                    </div>
                    <div class="tab-pane vivify flipInX" id="Contact-new">
                        <h6>Contact</h6>
                        <p>velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. helvetica</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Tab example 3 <small><code class="highlighter-rouge">.nav-tabs3</code></small></h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs3 white">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-new2">Home</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-new2">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-new2">Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="Home-new2">
                        <h6>Home</h6>
                        <p>master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate qui.</p>
                    </div>
                    <div class="tab-pane" id="Profile-new2">
                        <h6>Profile</h6>
                        <p>pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel </p>
                    </div>
                    <div class="tab-pane" id="Contact-new2">
                        <h6>Contact</h6>
                        <p>labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. helvetica</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Tab example 4 <small><code class="highlighter-rouge">.nav-tabs4</code></small></h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs4">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-new4">Home</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-new4">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-new4">Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="Home-new4">
                        <h6>Home</h6>
                        <p>master cleanse. Mustache cliche tempor, Seitan aliquip quis cardigan american apparel, butcher voluptate qui.</p>
                    </div>
                    <div class="tab-pane" id="Profile-new4">
                        <h6>Profile</h6>
                        <p>pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore</p>
                    </div>
                    <div class="tab-pane" id="Contact-new4">
                        <h6>Contact</h6>
                        <p>labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Pills with dropdowns</h2>
            </div>
            <div class="body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">Active</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);">Action</a>
                            <a class="dropdown-item" href="javascript:void(0);">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0);">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0);">Separated link</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="javascript:void(0);">Disabled</a>
                    </li>
                </ul>
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