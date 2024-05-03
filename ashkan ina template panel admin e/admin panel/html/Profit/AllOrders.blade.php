@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست سفارش ها</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>ایجاد کننده</th>
                                    <th>وضعیت</th>
                                    <th>هزینه ارسال</th>
                                    <th>سود سفارش</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="text-center align-middle">
                                        <th>
                                            {{ $order->user->username }}
                                        </th>
                                        @if( $order->status == "paid" )
                                            <th><span class="badge bg-success">پرداخت شده</span></th>
                                        @elseif( $order->status == "unpaid" )
                                            <th><span class="badge bg-danger">پرداخت نشده</span></th>
                                        @elseif( $order->status == "preparation" )
                                            <th><span class="badge bg-warning">در حال آماده سازی</span></th>
                                        @elseif( $order->status == "posted" )
                                            <th><span class="badge bg-dark">ارسال شده</span></th>
                                        @elseif( $order->status == "received" )
                                            <th><span class="badge bg-success">تحویل داده شده</span></th>
                                        @elseif( $order->status == "cancel" )
                                            <th><span class="badge bg-success">درخواست عودت</span></th>
                                        @elseif( $order->status == "canceled" )
                                            <th><span class="badge bg-danger">عودت شده!</span></th>
                                        @elseif( $order->status == "receivedCancel" )
                                            <th><span class="badge bg-info">درخواست عودت - سفارش تحویل شده</span></th>
                                        @elseif( $order->status == "receivedCanceled" )
                                            <th><span class="badge bg-info">عودت شده - سفارش تحویل شده</span></th>
                                        @endif
                                        <th>
                                            {{ $order->way_price }}
                                        </th>
                                        <th>
                                            @if( $order->status != 'canceled' && $order->status != 'receivedCanceled' )
                                                <span class="badge bg-success">{{ $order->paidOrderProfit }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $order->CanceledOrReceivedCanceledOrderProfit }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div>
                            <h6>مجموع کل سود : <span>{{ $sum }}</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
