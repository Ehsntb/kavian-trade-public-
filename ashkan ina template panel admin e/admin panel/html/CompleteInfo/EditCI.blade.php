@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش اطلاعات شخصی کاربران</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('personalinfo.update' , ['personalinfo' => $personalinfo->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">نام</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $personalinfo->name }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="fname" class="form-label">نام خانوادگی</label>
                                    <input id="fname" type="text" class="form-control" name="fname" value="{{ $personalinfo->fname }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="melicode" class="form-label">کد ملی</label>
                                    <input id="melicode" type="number" class="form-control" name="melicode" value="{{ $personalinfo->melicode }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="postalcode" class="form-label">کد پستی</label>
                                    <input id="postalcode" type="number" class="form-control" name="postalcode" value="{{ $personalinfo->postalcode }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="cartnumber" class="form-label">شماره کارت</label>
                                    <input id="cartnumber" type="number" class="form-control" name="cartnumber" value="{{ $personalinfo->cartnumber }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="shaba" class="form-label">شماره شبا</label>
                                    <input id="shaba" type="number" class="form-control" name="shaba" value="{{ $personalinfo->shaba }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="address" class="form-label">آدرس محل سکونت</label>
                                    <textarea id="address" class="form-control" name="address">{{ $personalinfo->address }}</textarea>
                                </div>

                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        ویرایش مشخصات
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
