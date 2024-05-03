    @extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4>ایجاد کاربر جدید</h4>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="UserName" class="form-label">نام کاربری</label>
                                    <input id="UserName" type="text" class="form-control" name="username">
                                </div>
                                <div class="col-lg-6">
                                    <label for="Phone" class="form-label">شماره تلفن</label>
                                    <input id="Phone" type="text" class="form-control" name="phone">
                                </div>
                                <div class="col-lg-6">
                                    <label for="Email" class="form-label">پست الکترونیک</label>
                                    <input id="Email" type="text" class="form-control" name="email">
                                </div>
                                <div class="col-lg-6">
                                    <label for="password" class="form-label">رمز عبور</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                                <div class="col-lg-6 d-flex mt-3">
                                    <span class="form-check-label"> ادمین </span>
                                    <input class="form-check-input ms-2" type="checkbox" name="Verify"/>
                                </div>
                                <div class="col-lg-6 d-flex mt-3">
                                    <span class="form-check-label"> فعال </span>
                                    <input class="form-check-input ms-2" type="checkbox" name="is_active"/>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        ثبت کاربر
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
