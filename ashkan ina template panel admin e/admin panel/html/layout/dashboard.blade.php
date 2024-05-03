@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4>اطلاعات کلی ازگیل شاپ</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-6 col-sm-12 text-center">
                                <div class="mt-4 bg-primary border-radius p-3 text-white">
                                    <div class="border-bottom p-2">
                                        <a class="text-white" href="{{ route('users.index') }}">
                                            تعداد کاربران
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        {{ $userCount }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 text-center">
                                <div class="mt-4 bg-warning border-radius p-3 text-white">
                                    <div class="border-bottom p-2">
                                        <a class="text-white" href="#">
                                            تیکت های باز
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        {{ $ticketCount }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 text-center">
                                <div class="mt-4 bg-secondary border-radius p-3 text-white">
                                    <div class="border-bottom p-2">
                                        <a class="text-white" href="{{route('personalinfo.index')}}">
                                            اطلاعات شخصی تایید نشده
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        {{ $PICount }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 text-center">
                                <div class="mt-4 bg-success border-radius p-3 text-white">
                                    <div class="border-bottom p-2">
                                        <a class="text-white" href="#">
                                            نظرات تایید نشده
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        {{ $commentsCount }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 text-center">
                                <div class="mt-4 bg-danger border-radius p-3 text-white">
                                    <div class="border-bottom p-2">
                                        <a class="text-white" href="#">
                                            سفارشات پرداخت شده
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        {{ $paidOrdersCount }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 text-center">
                                <div class="mt-4 bg-dark border-radius p-3 text-white">
                                    <div class="border-bottom p-2">
                                        <a class="text-white" href="#">
                                            تعداد محصولات فعال
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        {{ $ProductsCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


@endsection
