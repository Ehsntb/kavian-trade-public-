@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست اطلاعات شخصی کاربران</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>آی دی مشخصات</th>
                                    <th>ایجاد کننده</th>
                                    <th>وضعیت</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>کد پستی</th>
                                    <th>کد ملی</th>
                                    <th>شماره کارت</th>
                                    <th>کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($PIs as $PI)
                                    <tr class="text-center align-middle">
                                        <th>{{ $PI->id }}</th>
                                        <th>{{ $PI->user->username }}<span>&nbsp(  //TODO  )</span></th>
                                        @if($PI->is_verified == 1)
                                            <th><span class="badge bg-success">فعال</span></th>
                                        @else
                                            <th><span class="badge bg-danger">غیر فعال</span></th>
                                        @endif
                                        <th>{{ $PI->name }}</th>
                                        <th>{{ $PI->fname }}</th>
                                        <th>{{ $PI->postalcode }}</th>
                                        <th>{{ $PI->melicode }}</th>
                                        <th>{{ $PI->cartnumber }}</th>
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-1">
                                                    <a href="{{ route('personalinfo.edit' , ['personalinfo'=> $PI->id]) }}" class="btn btn-sm btn-success">ویرایش</a>
                                                </div>
                                                <form method="POST" action="{{ route('personalinfo.activate', ['personalinfo'=> $PI->id]) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-warning me-1">تغییر وضعیت</button>
                                                </form>
                                                <div class="me-1">
                                                    <form method="POST" action="{{ route('personalinfo.destroy' , ['personalinfo'=> $PI->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
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
