@extends('customer.main')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Thông tin cá nhân')


@section('content')
    <!-- Page Banner Section Start -->
<ng-controller ng-controller="AppController as demo">
    <div class="main-content-inner">


        <div class="page-content">

            <div class="row">
                <div class="col-sm-12">
                    <div class="tabbable">
                        <div class="row">
                            <div class="col-xs-8">
                                <h4 class="dashboard-title">
                                    <i class="icon-signal"></i>&nbsp;Hoạt động
                                </h4>
                            </div>
                            <!-- <div class="col-xs-4 ">
                                <div class="input-group">
                                    <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div> -->

                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 ">
                                <div class="col-xs-12 report-box infobox-green infobox-dark">
                                    <div class="infobox-icon">
                                        <i class="icon-signal"></i>
                                    </div>
                                    <div class="infobox-data">
                                        <div class="infobox-title ">
                                            
                                            Tiền bán hàng
                                        </div>
                                        <span class="infobox-data-number center ">{{Helper::formatCurency($priceTotal)}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6 ">
                                <div class="col-xs-12 report-box infobox-blue infobox-dark">
                                    <div class="infobox-icon">
                                        <i class="icon-shopping-cart"></i>
                                    </div>
                                    <div class="infobox-data">
                                        <div class="infobox-subtitle">
                                            <span >Số đơn hàng:</span>
                                            <a class="white" >{{$countOrderOnline}}</a>
                                        </div>
                                        <span class="infobox-subtitle">
                                           <span >Số hàng hóa: </span>
                                            <a class="white" >{{$countProduct}}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="col-xs-12  report-box infobox-red infobox-dark">
                                    <div class="infobox-icon">
                                        <i class="icon-undo"></i>
                                    </div>
                                    <div class="infobox-data">
                                        <div class="infobox-title">
                                            <span>Hàng khách trả</span>
                                            
                                        </div>
                                        <div class="infobox-data-number text-center">
                                            <span class="white" >{{$countOrderCancel}}</span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="col-xs-12  report-box infobox-orange infobox-dark">
                                    <div class="infobox-icon hidden-1024">
                                        <i class="icon-truck"></i>
                                    </div>

                                    
                                    <div class="infobox-data">
                                        <div class="infobox-subtitle">
                                            <span class="white" >Đơn đặt hàng:  {{$countOrderOnline}}</span>
                                        </div>
                                        <span class="infobox-small">
                                            <span class="white" >Xác nhận:  {{$countOrderDelivering}}</span>
                                            
                                        </span>
                                        <span class="infobox-small">
                                            <span class="white"> | Giao hàng: {{$countOrderDelivered}}</span>
                                            
                                        </span>

                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 ">
                                <div class="col-xs-12 col-sm-12 col-md-12 p-0">
                                    <div class="widget-box bd-orange">
                                        <div class="widget-header widget-header-flat infobox-orange infobox-dark">
                                            <h4 class="widget-title  ">
                                                <i class="fa fa-gift"></i>
                                                Đơn Hàng
                                            </h4>
                                        </div>

                                        <div class="widget-body" style="border: none; min-height: 144px;">
                                            <div class="widget-main">
                                                <div class="row">
                                                    <div class="col-xs-7 info  ">
                                                        Online
                                                    </div>
                                                    <div class="col-xs-5 data text-right">
                                                        {{$countOrderOnline}}
                                                    </div>
                                                    <div class="col-xs-7 info  ">
                                                        Đang Xử Lý
                                                    </div>
                                                    <div class="col-xs-5 data text-right  ">
                                                        {{$countOrderDelivering}}
                                                    </div>
                                                    <div class="col-xs-7 info  ">
                                                        Đang Giao
                                                    </div>
                                                    <div class="col-xs-5 data text-right">
                                                        {{$countOrderDelivered}}
                                                    </div>
                                                    <div class="col-xs-7 info  ">
                                                        Thành Công
                                                    </div>
                                                    <div class="col-xs-5 data text-right">
                                                        {{$countOrderCompleted}}
                                                    </div>
                                                    <div class="col-xs-7 info  ">
                                                        Đã Hủy
                                                    </div>
                                                    <div class="col-xs-5 data text-right">
                                                        {{$countOrderCancel}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.widget-main -->
                                        </div>
                                    

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 p-0">
                                    <div class="widget-box">
                                        <div class="widget-header widget-header-flat ">
                                            <h4 class="widget-title ng-binding">
                                                <i class="icon-rss"></i>
                                                Tin chuyên ngành
                                            </h4>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="row">
                                                    @foreach($news as $new)
                                                        <div class="col-xs-12" >
                                                            <h5>
                                                                <a href="/bai-viet/{{@$new->slug}}.html" target="_blank" >{{$new->title}}</a></h5>
                                                            <p>
                                                                {!! $new->short_description !!}
                                                            </p>
                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="widget-box bd-blue">
                                    <div class="widget-header widget-header-flat infobox-blue infobox-dark">
                                        <h4 class="widget-title  ">
                                            <i class="icon-signal"></i>
                                            Biểu Đồ
                                        </h4>
                                    </div>
                                    <div class="widget-body" style="border: none;">
                                        <div class="widget-main">
                                            <div class="row">
                                                <div id="chartContainer" class="width-95 center k-chart" >
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.widget-main -->
                                    </div>
                                    <!-- /.widget-body -->
                                </div>
                                <!-- /.widget-box -->
                            </div>

                        </div>

                        


                            
                    </div>
                </div>
            

            </div>

            

        </div>
    </div>
</ng-controller>

@stop

@section('script')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">

<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script>
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript">
   $('.birthday').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       format: 'dd/mm/yyyy' 
   });
   $( document ).ready(function() {
        $('#imageShow').on('click',function() {
            $('#fileupload').click();
        });
        $('#fileupload').on('change',function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#imageShow').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });
    });

</script>
<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>

<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>



<script>
    
customInterpolationApp.controller('AppController', function($scope, $http , $q) {
         // Funds Variable
         $scope.showPassword = 0;
         $scope.province = '{{@$user->province_id}}';
         $scope.district = '{{@$user->district_id}}';
         $scope.ward = '{{@$user->ward_id}}';

         $scope.district_list = [];
         $scope.ward_list = [];

         var canceler = $q.defer();
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         
        $scope.updatePassword = function(){
            $scope.showPassword = 1;
            $('.focus_pw').focus();
        }

        $scope.getDistricts = function(){
            let id_province = $scope.province;
            if(id_province != ''){
                $scope.ward_list = [];
                $scope.district_list = [];
                $scope.district = '';
                $scope.ward = '';
                $http.get("/admin/district/list-by-province/"+id_province).then(function(data, status) {
                    $scope.district_list = data.data.data;
                });
            } else {
                $scope.ward_list = [];
                $scope.district_list = [];
                $scope.district = '';
                $scope.ward = '';
            }
            
        }
        if ( $scope.province != '' ) {
            $scope.getDistricts();
            $scope.district = '{{@$user->district_id}}';
        }
        


        $scope.getWards = function(){
            let id_ward = $scope.district;
            if(id_ward != ''){
                $scope.ward_list = [];
                $scope.ward = '';
                $http.get("/admin/ward/list-by-district/"+id_ward).then(function(data, status) {
                    $scope.ward_list = data.data.data;
                });
            } else {
                $scope.ward_list = [];
                $scope.ward = '';
            }
            
        }
        if ( $scope.district != '' ) {
            $scope.getWards();
            $scope.ward = '{{@$user->ward_id}}';
        }


        



    

});

</script>

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.stock.min.js"></script>

<script type="text/javascript">
jQuery(function($) {
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    })
    //show datepicker when clicking on the icon
    .next().on(ace.click_event, function(){
        $(this).prev().focus();
    });

    //or change it into a date range picker
    $('.input-daterange').datepicker({autoclose:true});


});
$(function () {
  var dataPoints1 = [], dataPoints2 = [], dataPoints3 = [];
  var stockChartOptions = {
    theme: "light2",
    exportEnabled: true,
    title:{
      text:"Thống Kê Đơn Hàng"
    },
    charts: [{
      toolTip: {
        shared: true
      },
      axisX: {
        lineThickness: 5,
        tickLength: 0,
        labelFormatter: function(e) {
          return "";
        }
      },
      axisY: {
        prefix: "€",
        tickLength: 0
      },
      legend: {
        verticalAlign: "top"
      },
      data: [{
        showInLegend: true,
        name: "Price (in EUR)",
        yValueFormatString: "€#,###.##",
        type: "candlestick",
        dataPoints : dataPoints1
      }]
    },{
      height: 100,
      toolTip: {
        shared: true
      },
      axisY: {
        prefix: "€",
        tickLength: 0,
        labelFormatter: addSymbols
      },
      legend: {
        verticalAlign: "top"
      },
      data: [{
        showInLegend: true,
        name: "Volume (LTC/EUR)",
        yValueFormatString: "€#,###.##",
        dataPoints : dataPoints2
      }]
    }],
    navigator: {
      data: [{
        dataPoints: dataPoints3
      }],
      slider: {
        minimum: new Date(2018, 02, 01),
        maximum: new Date(2018, 04, 01)
      }
    }
  }
  $.getJSON("https://canvasjs.com/data/docs/ltceur2018.json", function(data) {
    for(var i = 0; i < data.length; i++){
      dataPoints1.push({x: new Date(data[i].date), y: [Number(data[i].open), Number(data[i].high), Number(data[i].low), Number(data[i].close)]});;
      dataPoints2.push({x: new Date(data[i].date), y: Number(data[i].volume_eur)});
      dataPoints3.push({x: new Date(data[i].date), y: Number(data[i].close)});
    }
    $("#chartContainer").CanvasJSStockChart(stockChartOptions);
  });
  function addSymbols(e){
    var suffixes = ["", "K", "M", "B"];
    var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);
    if(order > suffixes.length - 1)
      order = suffixes.length - 1;
    var suffix = suffixes[order];
    return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
  }
});


</script>
@stop