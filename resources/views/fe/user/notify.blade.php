@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Thông Báo')


@section('content')
    <!-- Page Banner Section Start -->
    <div class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                
                <div class="col-12">
                    <div class="row">
                        @include('fe.layouts.sidebarUser')  

                        <div class="col-lg-9 col-12">
                            <div class="tab-pane">
                                <div class="myaccount-content">
                                    <h3>Thông báo</h3>

                                    <div class="account-details-form">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Tin Nhắn</th>
                                                    <th>Thời Gian</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($notifyList as $noti)
                                                    <tr>
                                                        <td>{!! $noti->load == 0 ? '<b>'.$noti->type->message.'</b>' : $noti->type->message !!}</td>
                                                        <td>{!! $noti->load == 0 ? '<b>'.$noti->created_at.'</b>' : $noti->created_at !!}</td>
                                                    </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                        {{ $notifyList->links() }}
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>


@stop

@section('script')

@stop