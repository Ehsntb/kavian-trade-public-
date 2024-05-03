@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست محصولات</h2>
                        <a href="{{ route('products.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>ایجاد محصول جدید</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>آی دی محصول</th>
                                    <th class="col">ایجاد کننده</th>
                                    <th class="col">عنوان محصول</th>
                                    <th class="col">وضعیت</th>
                                    <th class="col">ویژه</th>
                                    <th class="col">قیمت</th>
                                    <th class="col">تخفیف</th>
                                    <th class="col">تعداد</th>
                                    <th class="col">وزن</th>
                                    <th class="col">مقدار بازدید</th>
                                    <th class="col">مقدار خرید</th>
                                    <th class="col">کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="text-center align-middle">
                                        <th>{{ $product->id }}</th>
                                        <th>
                                            @if($product->user)
                                                {{ $product->user->username }}
                                            @else
                                                No User Associated
                                            @endif
                                        </th>
                                        <th>{{ $product->title }}</th>
                                        @if($product->is_active == 1)
                                            <th><span class="badge bg-success">فعال</span></th>
                                        @else
                                            <th><span class="badge bg-danger">غیر فعال</span></th>
                                        @endif
                                        @if($product->is_special == 1)
                                            <th><span class="badge bg-success">Ok</span></th>
                                        @else
                                            <th><span class="badge bg-danger">No</span></th>
                                        @endif
                                        <th>{{ $product->price }}</th>
                                        <th>{{ $product->discount }}%</th>
                                        <th>{{ $product->inventory }}</th>
                                        <th>{{ $product->weight }}</th>
                                        <th>{{ $product->view_count }}</th>
                                        <th>{{ $product->buy_count }}</th>
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <a href="{{ route('products.edit' , ['product'=> $product->id]) }}" class="btn btn-sm btn-success">ویرایش</a>
                                                </div>
                                                <div class="me-2">
                                                    <form method="POST" action="{{ route('products.destroy' , ['product'=> $product->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger ms-1">
                                                            حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
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
@endsection
