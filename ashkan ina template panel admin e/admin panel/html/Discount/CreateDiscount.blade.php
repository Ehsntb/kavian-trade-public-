@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ایجاد تخفیف جدید</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('discounts.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">عنوان تخفبف *</label>
                                    <input id="title" type="text" class="form-control" name="title">
                                </div>

                                <div class="col-lg-6">
                                    <label for="short" class="form-label">توضیح کوتاه *</label>
                                    <input id="short" class="form-control" name="short">
                                </div>

                                <div class="col-lg-12">
                                    <label for="long" class="form-label">توضیح کامل *</label>
                                    <textarea id="long" class="form-control" name="long"></textarea>
                                </div>

                                <div class="col-lg-4">
                                    <label for="short" class="form-label"> مقدار (مثال 10000 تومان یا مقادیر بین 1 تا 100) *</label>
                                    <input id="short" class="form-control" name="amount">
                                </div>

                                <div class="col-lg-4">
                                    <label for="short" class="form-label">امتیاز مورد نیاز</label>
                                    <input id="short" class="form-control" name="score">
                                </div>

                                <div class="col-lg-4">
                                    <label for="low_price" class="form-label">کف قیمت برای استفاده (اختیاری)</label>
                                    <input id="low_price" class="form-control" name="low_price">
                                </div>

                                <div class="col-lg-4">
                                    <label for="discount_user" class="form-label">ثبت شخص برای کد تخفیف</label>
                                    <select id="discount_user" class="form-control" name="discount_user">
                                        <option value="">انتخاب کاربر</option>
                                        @foreach(\App\Models\User::all() as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <label for="datetime" class="form-label">تاریخ و زمان (1402/12/15 22:35) *</label>
                                    <input id="datetime" type="text" class="form-control" name="exp_at">
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">کاربران</label>
                                    <select id="users" class="form-control" name="users[]" multiple>
                                        @foreach(\App\Models\User::all() as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                    <a href="#" class="btn btn-primary btn-brand mt-1">انتخاب همه کاربران</a>
                                    <a href="#" class="btn btn-primary btn-unbrand mt-1">حذف همه</a>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">محصولات</label>
                                    <select id="products" class="form-control" name="products[]" multiple>
                                        @foreach(\App\Models\Product::all() as $product)
                                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                    <a href="#" class="btn btn-primary btn-Pbrand mt-1">انتخاب همه محصولات</a>
                                    <a href="#" class="btn btn-primary btn-Punbrand mt-1">حذف همه</a>
                                </div>

                                <label class="col-lg-12 d-flex align-items-center mt-3">
                                    <input class="form-check-input" type="checkbox" name="is_active"/>
                                    <span class="form-check-label ms-2"> فعال / غیر فعال </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" name="is_gift"/>
                                    <span class="form-check-label ms-2"> هدیه </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" name="is_for_all"/>
                                    <span class="form-check-label ms-2"> برای اعضای جدید؟ </span>
                                </label>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script>
        $('#users').select2({
            'placeholder' : 'افراد مورد نظر را انتخاب کنید'
        })
        $('#products').select2({
            'placeholder' : 'محصولات مورد نظر را انتخاب کنید'
        })
        $('.btn-brand').click(function(e) {
            e.preventDefault();
            $('#users > option').prop('selected', 'selected');
            $('#users').trigger('change');
        });
        $('.btn-unbrand').click(function(e) {
            e.preventDefault();
            $('#users').val([]); // Set the value of the select element to an empty array to unselect all options
            $('#users').trigger('change');
        });
        $('.btn-Pbrand').click(function(e) {
            e.preventDefault();
            $('#products > option').prop('selected', 'selected');
            $('#products').trigger('change');
        });
        $('.btn-Punbrand').click(function(e) {
            e.preventDefault();
            $('#products').val([]); // Set the value of the select element to an empty array to unselect all options
            $('#products').trigger('change');
        });
    </script>
@endsection
