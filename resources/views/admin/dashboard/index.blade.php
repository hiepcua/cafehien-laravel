@extends('layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Index')


@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h1>Hi, Welcomeback!</h1>
                <span>Thống Kê,</span>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-12">
            <div class="section_title">

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="slider2" class="carousel vert slide" data-ride="carousel" data-interval="2800">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div>Tổng Thành Viên</div>
                                        <div class="mt-3 h1">{{$dataUser}}</div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body bg-warning">
                            <div id="slider2" class="carousel vert slide" data-ride="carousel" data-interval="2800">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div>Tổng Đơn Hàng</div>
                                        <div class="mt-3 h1">{{$dataOrders}}</div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 ">
                    <div class="card">
                        <div class="card-body bg-success">
                            <div id="slider2" class="carousel vert slide " data-ride="carousel" data-interval="2800">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div>Tổng Bài Viết</div>
                                        <div class="mt-3 h1">{{$dataPost}}</div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body bg-info">
                            <div id="slider2" class="carousel vert slide" data-ride="carousel" data-interval="2800">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div>Tổng Sản Phẩm</div>
                                        <div class="mt-3 h1">{{$dataProducts}}</div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-12">
            
            <div class="section_title">
                <div>
                    <div class="btn-group mb-3">
                        <div class="btn-group" role="group">
                            <form action="" method="POST" class="formCondition" >
                                @csrf
                                <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{$strCondition}}</button>
                                <input class="hiddenCondition" name="condition" value="{{$valCondition}}" type="hidden" />
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:updateCondition(0);">Tuần Này</a>
                                    <a class="dropdown-item" href="javascript:updateCondition(1);">Tuần Trước</a>
                                    <a class="dropdown-item" href="javascript:updateCondition(2);">Tháng Này</a>
                                    <a class="dropdown-item" href="javascript:updateCondition(3);">Tháng Trước</a>
                                    <a class="dropdown-item" href="javascript:updateCondition(4);">Năm Nay</a>
                                    <a class="dropdown-item" href="javascript:updateCondition(5);">Năm Trước</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix row-deck">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Thống Kê Đơn Hàng</h2>
                </div>
                <div class="body">
                    <div class="d-flex flex-row">
                        <div class="pb-3">
                            <h5 class="mb-0">{{$count}}</h5>
                            <small class="text-muted font-11">Tổng Đơn Hàng</small>
                        </div>
                    </div>
                    <div id="flotChart" class="flot-chart"></div>
                </div>
            </div>
        </div>

        
        
    </div>
    
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/bundles/flotscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
@stop

@section('page-script')
<script type="text/javascript">
    function updateCondition(id) {
        $('.hiddenCondition').val(id);
        $('.formCondition').submit();
    }
    $( document ).ready(function() {
        var flotSampleData1 = [];
        var flotSampleDataUser = [];
        @foreach($data as $key => $item)
            flotSampleData1.push([{{$key}},{{$item->total * 10 / 500000}}]);
        @endforeach
        

        var plot = $.plot('#flotChart', [{
            data: flotSampleData1,
            color: '#9367B4',
            lines: {
                fillColor: { colors: [{ opacity: 0 }, { opacity: 0.2 }]}
            }}],{
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 8
            },
            yaxis: {
                show: true,
                    min: 0,
                    max: 100,
                ticks: [[0,''],[20,'1M'],[40,'2M'],[60,'3M'],[80,'4M']],        
            },
            xaxis: {
                show: true,
            }
        });

        
    }); 
</script>
@stop