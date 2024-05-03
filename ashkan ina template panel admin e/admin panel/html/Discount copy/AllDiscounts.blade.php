@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست تخفیف ها</h2>
                        <a href="{{ route('discounts.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>تخفیف جدید</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th class="col">ایجاد کننده</th>
                                    <th class="col">عنوان</th>
                                    <th class="col">کد</th>
                                    <th class="col">انقضا</th>
                                    <th class="col">مدت زمان باقی</th>
                                    <th class="col">وضعیت</th>
                                    <th class="col">توضیح کوتاه</th>
                                    <th class="col">کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($discounts as $discount)
                                    <tr class="text-center align-middle">
                                        <th>
                                            {{ $discount->user->username }}
                                        </th>
                                        <th>{{ $discount->title }}</th>
                                        <th>{{ $discount->token }}</th>
                                        <th>{{ jdate( $discount->exp_at ) }}</th>
                                        <th>
                                            @if ($discount->exp_at < now())
                                                <p>منقضی شده</p>
                                            @else
                                                @php
                                                    $remaining = now()->diff(jdate($discount->exp_at)->toCarbon());
                                                    $remainingDays = $remaining->days;
                                                    $remainingHours = $remaining->h;
                                                    $remainingMinutes = $remaining->i;
                                                @endphp

                                                <p>
                                                    {{ $remainingDays > 0 ? $remainingDays . ' روز ' : '' }}
                                                    {{ $remainingHours > 0 ? $remainingHours . ' ساعت ' : '' }}
                                                    {{ $remainingMinutes > 0 ? $remainingMinutes . ' دقیقه ' : '' }}
                                                    مانده
                                                </p>
                                            @endif
                                        </th>
                                        @if($discount->is_active == 1)
                                            <th><span class="badge bg-success">فعال</span></th>
                                        @else
                                            <th><span class="badge bg-danger">غیر فعال</span></th>
                                        @endif
                                        <th>{{ $discount->short }}</th>
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <a href="{{ route('discounts.edit' , ['discount'=> $discount->id]) }}" class="btn btn-sm btn-success">ویرایش</a>
                                                </div>
                                                <div class="">
                                                    <form method="POST" action="{{ route('discounts.destroy' , ['discount'=> $discount->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger ms-2">
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
