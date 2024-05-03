@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست سفارشات</h2>
                    </div>
                    @include('layouts.errors')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>سفارش</th>
                                    <th>مشخصات</th>
                                    <th>آدرس</th>
                                    <th>جزئیات</th>
                                    <th>تخفیف</th>
                                    <th>ارسال</th>
                                    <th>مجموع</th>
                                    <th>وضعیت</th>
                                    <th>تغییر</th>
                                    <th>کد رهگیری</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="text-center align-middle">
                                        <th>{{ $order->orderserial }}</th>
                                        <th>
                                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#userDetail-{{ $order->id }}">مشخصات</button>
                                        </th>
                                        <th>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addressDetail-{{ $order->id }}">آدرس</button>
                                        </th>
                                        <th>
                                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#productDetail-{{ $order->id }}">جزئیات</button>
                                        </th>
                                        <th>
                                            @if($order->discount != null)
                                                {{ number_format($order->discount, 0, '.', '/') }}
                                            @else
                                                تخفیف ندارد!
                                            @endif
                                        </th>
                                        <th>{{ $order->OrderWay->price }} به ازای هر کیلو - {{ $order->OrderWay->title }}</th>
                                        <th>{{ $order->sale_price }}</th>
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
                                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#OrderStatusDetail-{{ $order->id }}">تغییر</button>
                                        </th>

                                        @if($order->tracking_serial)
                                            <th>
                                                {{ $order->tracking_serial }}
                                                <a href="{{ route('track.edit' , ['order' => $order->id]) }}" class="btn btn-dark btn-sm ms-2">ویرایش</a>
                                            </th>
                                        @else
                                            <th>
                                                کد رهگیری ثبت نشده
                                                <a href="{{ route('track.add', ['order' => $order->id]) }}" class="btn btn-primary btn-sm ms-2">ثبت</a>
                                            </th>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    @foreach($orders as $order)
        <!-- HTML for the modal -->
        <div class="modal fade" id="userDetail-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="userDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">مشخصات شخصی - {{ $order->user->username }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if($order->user->personalinfo)
                            <div class="row">
                                <div class="col-6">
                                    <label for="UserName" class="form-label">نام نام خانوادگی</label>
                                    <input id="UserName" type="text" class="form-control" name="username" value="{{ $order->user->personalinfo->name }} - {{ $order->user->personalinfo->fname }}">
                                </div>
                                <div class="col-6">
                                    <label for="Name" class="form-label">شماره کارت</label>
                                    <input id="Name" type="text" class="form-control" name="Name" value="{{ $order->user->personalinfo->cartnumber }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="Melicode" class="form-label">کد ملی</label>
                                    <input id="Melicode" type="text" class="form-control" name="Melicode" value="{{ $order->user->personalinfo->melicode }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="Postalcode" class="form-label">کد پستی</label>
                                    <input id="Postalcode" type="text" class="form-control" name="Postalcode" value="{{ $order->user->personalinfo->postalcode }}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="Address" class="form-label">آدرس شاخص</label>
                                    <textarea id="my-description" class="form-control" name="Address">{{ $order->user->personalinfo->address }}</textarea>
                                </div>
                                <div class=" d-flex">
                                    <span class="form-check-label"> فعال / غیر فعال </span>
                                    <input class="form-check-input ms-2" type="checkbox" name="verify"
                                           @if($order->user->personalinfo->is_verified == '1')
                                               checked
                                        @endif
                                    />
                                </div>
                            </div>
                        @else
                            اطلاعات شخصی موجود نیست!
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- HTML for the modal -->
        <div class="modal fade" id="OrderStatusDetail-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="userDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">وضعیت سفارش - {{ $order->orderserial }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center bg-dark">
                        <label>تغییر وضعیت سفارش</label>
                        <br>
                        <br>
                        <div class="container">
                            <div class="text-start">
                                <form method="POST" id="changeStatusForm" action="{{ route('order.status.change', $order->id) }}">
                                    @csrf
                                    <div class="">
                                        <input id="preparation" type="radio" name="status" value="option1" data-bs-original-title="" title="">
                                        <label for="preparation">در حال آماده سازی</label>
                                    </div>
                                    <div class="">
                                        <input id="posted" type="radio" name="status" value="option2" data-bs-original-title="" title="">
                                        <label for="posted">ارسال شده</label>
                                    </div>
                                    <div class="">
                                        <input id="received" type="radio" name="status" value="option3" data-bs-original-title="" title="">
                                        <label for="received">تحویل داده شده</label>
                                    </div>
                                    <div class="">
                                        <input id="cancel" type="radio" name="status" value="option4" data-bs-original-title="" title="">
                                        <label for="cancel">درخواست عودت</label>
                                    </div>
                                    <div class="">
                                        <input id="canceled" type="radio" name="status" value="option5" data-bs-original-title="" title="">
                                        <label for="canceled">عودت داده شده</label>
                                    </div>
                                    <div class="">
                                        <input id="paid" type="radio" name="status" value="option6" data-bs-original-title="" title="">
                                        <label for="paid">پرداخت شده</label>
                                    </div>
                                    <div class="">
                                        <input id="receivedCancel" type="radio" name="status" value="option7" data-bs-original-title="" title="">
                                        <label for="receivedCancel">درخواست عودت کالای تحویل شده</label>
                                    </div>
                                    <div class="">
                                        <input id="receivedCanceled" type="radio" name="status" value="option8" data-bs-original-title="" title="">
                                        <label for="receivedCanceled">تائید درخواست عودت کالای تحویل شده</label>
                                    </div>
                                    <br>
                                    <br>
                                    <h4 class="help-block m-t-help-block bg-warning p-4 border-radius text-center f-w-700">لطفا با دقت انتخاب کنید پس از تغییر روش پیامک به کاربر ارسال خواهد شد!!</h4>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">تغییر وضعیت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- HTML for the modal -->
        <div class="modal fade" id="addressDetail-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="addressDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">آدرس - {{ $order->user->username }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if($order->address)
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="title" class="form-label">عنوان آدرس</label>
                                        <input id="title" type="text" class="form-control" value="{{ $order->address->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="postalcode" class="form-label">کد پستی</label>
                                        <input id="postalcode" type="text" class="form-control" value="{{ $order->address->postalcode }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="phone" class="form-label">شماره تلفن</label>
                                        <input id="phone" type="text" class="form-control" value="{{ $order->address->phone }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="Postalcode" class="form-label">توضیحات</label>
                                        <textarea class="form-control">{{ $order->address->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="Plaque" class="form-label">پلاک</label>
                                        <input id="Plaque" type="text" class="form-control" value="{{ $order->address->Plaque }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="floor" class="form-label">طبقه</label>
                                        <input id="floor" type="text" class="form-control" value="{{ $order->address->floor }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="unit" class="form-label">واحد</label>
                                        <input id="unit" type="text" class="form-control" value="{{ $order->address->unit }}">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center">
                                <p>
                                    آدرس ثبت نشده!
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- HTML for the modal -->
        <div class="modal fade" id="productDetail-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="productDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">محصولات - {{ $order->user->username }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 row">
                                @if($order->unpaid_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-dark border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ ثبت سفارش
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->unpaid_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->paid_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-pink border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ پرداخت سفارش
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->paid_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->preparation_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-warning border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ اماده سازی سفارش
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->preparation_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->posted_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-primary border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                   تاریخ ارسال سفارش
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->posted_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->received_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-secondary border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ تحویل سفارش
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->received_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->cancel_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-warning border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ درخواست عودت سفارش پرداخت شده
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->cancel_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->receivedCancel_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-dark border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ درخواست عودت سفارش تحویل شده
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->receivedCancel_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->canceled_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-success border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ تائید عودت سفارش پرداخت شده
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->canceled_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($order->receivedCanceled_at != null)
                                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                        <div class="mt-4 bg-info border-radius p-3 text-white">
                                            <div class="border-bottom p-2">
                                                <a class="text-white" href="#">
                                                    تاریخ تائید عودت سفارش تحویل شده
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                {{ jdate($order->receivedCanceled_at) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @foreach($order->product as $product)
                                <div class="col-xl-4 col-lg-6 col-sm-12 p-2">
                                    <div class="p-3 border border-6 border-radius mt-2">
                                        <div class="d-flex align-items-center">
                                            <a href="/products/{{ $product->slug }}"><img class="ms-md-2 mt-2 mt-md-0" src="{{ $product->image }}" height="100" width="100"></a>
                                            <div class="ms-md-4">
                                                <h5>{{ $product->title }}</h5>
                                                <span>{{ number_format($product->pivot->product_price, 0, '.', '/') }} تومان</span>
                                            </div>
                                            <div dir="rtl" class="me-auto d-flex flex-column flex-md-row align-items-center mt-2 mt-md-0">
                                                <div class="d-flex align-items-center border-size-3 border-radius p-1 mb-2 mb-md-0">
                                                    <span class="me-2">تعداد</span>
                                                    <span>{{ $product->pivot->quantity }}</span>
                                                </div>
                                                <div class="d-flex align-items-center border-size-3 border-radius p-1 mb-2 mb-md-0 ms-2">
                                                    <span class="me-2">وزن</span>
                                                    <span>
                                                        @if($product->pivot->weight != null)
                                                            {{ $product->pivot->weight }}
                                                        @else
                                                            ثابت
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr >
                                        <div class="d-flex ms-2 mt-2 mt-md-0 text-end p-1">
                                            <div><span>مجموع</span></div>
                                            <div class="ms-auto"><span>{{ number_format($product->pivot->sale_price , 0, '.', '/') }} تومان</span></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
