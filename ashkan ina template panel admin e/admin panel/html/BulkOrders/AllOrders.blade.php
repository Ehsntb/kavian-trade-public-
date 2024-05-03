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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>شماره</th>
                                    <th>مشخصات</th>
                                    <th>آدرس</th>
                                    <th>محصولات</th>
                                    <th>تخفیف</th>
                                    <th>ارسال</th>
                                    <th>مجموع</th>
                                    <th>وضعیت</th>
                                    <th>تغییر</th>
                                    <th>رهگیری</th>
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
                                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#productDetail-{{ $order->id }}">محصولات</button>
                                        </th>
                                        <th>
                                            @if($order->discount != null)
                                                {{ number_format($order->discount, 0, '.', '/') }}
                                            @else
                                                ندارد!
                                            @endif
                                        </th>
                                        @if($order->OrderWay)
                                            <th>{{ $order->OrderWay->price }} به ازای هر کیلو - {{ $order->OrderWay->title }}</th>
                                        @else
                                            <th>انتخاب نشده!</th>
                                        @endif
                                        <th>{{ $order->price }}</th>
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
                                        @endif

                                        @if($order->status == 'cancel')
                                            <th>
                                                <form method="POST" action="{{ route('Bulk.change.ToCanceled', $order->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-warning ms-1">عودت شده!</button>
                                                </form>
                                            </th>
                                        @elseif($order->status == 'paid')
                                            <th>
                                                <form method="POST" action="{{ route('Bulk.change.ToPreparation', $order->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-warning ms-1">درحال آماده سازی!</button>
                                                </form>
                                            </th>
                                        @elseif($order->status == 'preparation')
                                            <th>
                                                <form method="POST" action="{{ route('Bulk.change.ToPosted', $order->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-warning ms-1">ارسال شده!</button>
                                                </form>
                                            </th>
                                        @elseif($order->status == 'posted')
                                            <th>
                                                <form method="POST" action="{{ route('Bulk.change.ToReceived', $order->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-warning ms-1">تحویل داده شده!</button>
                                                </form>
                                            </th>
                                        @else
                                            <th>
                                                <form method="POST" action="{{ route('Bulk.change.ToPaid', $order->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-warning ms-1">پرداخت شده!</button>
                                                </form>
                                            </th>
                                        @endif

                                        @if($order->tracking_serial)
                                            <th>
                                                {{ $order->tracking_serial }}
                                                <a href="{{ route('Bulk.track.edit' , ['order' => $order->id]) }}" class="btn btn-dark btn-sm ms-2">ویرایش</a>
                                            </th>
                                        @else
                                            <th>
                                                ثبت نشده
                                                <a href="{{ route('Bulk.track.add', ['order' => $order->id]) }}" class="btn btn-primary btn-sm ms-2">ثبت</a>
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
                            @foreach($order->product as $product)
                                <div class="col-xl-4 col-lg-6 col-sm-12 p-2">
                                    <div class="p-3 border border-6 mt-2">
                                        <div class="d-flex align-items-center">
                                            <a href="/products/{{ $product->slug }}"><img class="ms-md-2 mt-2 mt-md-0" src="{{ $product->image }}" height="100" width="100"></a>
                                            <div class="ms-md-4">
                                                <h5>{{ $product->title }}</h5>
                                                <span>{{ number_format($product->pivot->sale_price, 0, '.', '/') }} تومان</span>
                                            </div>
                                            <div dir="rtl" class="me-auto d-flex flex-column flex-md-row align-items-center mt-2 mt-md-0">
                                                <div class="d-flex align-items-center border-size-3 border-radius p-1 mb-2 mb-md-0">
                                                    <span class="me-2">تعداد</span>
                                                    <span>{{ $product->pivot->quantity }}</span>
                                                </div>
                                                <div class="d-flex align-items-center p-1 ms-md-2">
                                                    <span class="me-2">وزن</span>
                                                    <span>{{ $product->pivot->weight }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="border-size-3">
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
