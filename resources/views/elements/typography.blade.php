@extends('layout.master')
@section('parentPageTitle', 'Elements')
@section('title', 'Typography')


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
                <h2>Header </h2>
            </div>
            <div class="body">
                <h1>Dashboard Heading 1</h1>
                <h2>Dashboard Heading 2</h2>
                <h3>Dashboard Heading 3</h3>
                <h4>Dashboard Heading 4</h4>
                <h5>Dashboard Heading 5</h5>
                <h6>Dashboard Heading 6</h6>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Paragraph</h2>
            </div>
            <div class="body">
                <p>Appropriately benchmark web-enabled bandwidth and functionalized leadership skills. Conveniently syndicate global opportunities without interactive methods of empowerment. Collaboratively conceptualize user-centric e-tailers for visionary methodologies. Dramatically myocardinate. Phosfluorescently disintermediate unique resources whereas reliable mindshare. Competently optimize client-focused infrastructures vis-a-vis e-business human capital. Uniquely formulate sustainable benefits whereas functional results. Energistically myocardinate bleeding-edge e-business.</p>
                <hr>
                <div class="row clearfix">
                    <div class="col-md-3">
                        <p class="align-left"><b>Align Left</b></p>
                        <div class="align-left"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                    </div>
                    <div class="col-md-3">
                        <p class="align-center"><b>Align Center</b></p>
                        <div class="align-center"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                    </div>
                    <div class="col-md-3">
                        <p class="align-right"><b>Align Right</b></p>
                        <div class="align-right"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                    </div>
                    <div class="col-md-3">
                        <p class="align-justify"><b>Align Justify</b></p>
                        <div class="align-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ali Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Text Style</h2>
            </div>
            <div class="body">
                <code>.text-muted</code>
                <p class="text-muted">Convey meaning through color with a handful of emphasis utility classes.</p>
                <code>.text-primary</code>
                <p class="text-primary">Convey meaning through color with a handful of emphasis utility classes.</p>
                <code>.text-success</code>
                <p class="text-success">Convey meaning through color with a handful of emphasis utility classes.</p>
                <code>.text-info</code>
                <p class="text-info">Convey meaning through color with a handful of emphasis utility classes.</p>
                <code>.text-warning</code>
                <p class="text-warning">Convey meaning through color with a handful of emphasis utility classes.</p>
                <code>.text-danger</code>
                <p class="text-danger">Convey meaning through color with a handful of emphasis utility classes.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Other Style</h2>
            </div>
            <div class="body">
                <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                <p><del>This line of text is meant to be treated as deleted text.</del></p>
                <p class="text-lowercase"><code>.text-lowercase</code> Lowercased text.</p>
                <p class="text-uppercase"><code class="text-lowercase">.text-uppercase</code> Uppercased text.</p>
                <p class="text-capitalize"><code class="text-lowercase">.text-capitalized</code> Capitalized text.</p>                            
                <p>Make a paragraph stand out by adding <code>.lead</code></p>
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