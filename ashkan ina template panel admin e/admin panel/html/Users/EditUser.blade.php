@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4>ویرایش کاربر - {{ $user->username }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update' , ['user' => $user->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="username" class="form-label">نام کاربری</label>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone" class="form-label">شماره تلفن</label>
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="password" class="form-label">رمز عبور</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                                <div class="col-lg-6">
                                    <label for="email" class="form-label">پست الکترونیک</label>
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="d-flex col-lg-6">
                                    <span class="form-check-label"> ادمین </span>
                                    <input id="checkbox" type="checkbox" class="form-check-input ms-2" name="Verify"
                                           @if($user->is_superuser != 0)
                                               checked
                                        @endif
                                    >
                                </div>
                                <div class="d-flex col-lg-6">
                                    <span class="form-check-label"> فعال </span>
                                    <input id="checkbox" type="checkbox" class="form-check-input ms-2" name="is_active"
                                        @if($user->is_active != 0)
                                            checked
                                        @endif
                                    >
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        ویرایش کاربر
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
