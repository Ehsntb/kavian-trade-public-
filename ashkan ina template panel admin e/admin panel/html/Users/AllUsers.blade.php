@extends('admin.layout.index')

@section('profilecontent')
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                            <h2 class="content-title card-title">لیست کاربران</h2>
                            <a href="{{ route('users.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>کاربر جدید</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center table-bordered">
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">نام کاربری</th>
                                        <th scope="col">تلفن</th>
                                        <th scope="col">نقش</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col" class="text-end"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="text-center align-middle">
                                            <td><b>{{ $user->username }}</b></td>
                                            <td>{{ $user->phone }}</td>
                                            @if($user->is_superuser)
                                                <th><span class="badge bg-success">مدیر</span></th>
                                            @else
                                                <th><span class="badge bg-danger">کاربر</span></th>
                                            @endif
                                            @if($user->is_active)
                                                <th><span class="badge bg-success">فعال</span></th>
                                            @else
                                                <th><span class="badge bg-danger">غیرفعال</span></th>
                                            @endif
                                            <td class="d-flex justify-content-end">
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#userDetail-{{ $user->id }}">مشخصات</button>
                                                <a href="{{ route('users.edit' , ['user'=> $user->id]) }}" class="btn btn-warning btn-sm ms-1">ویرایش</a>
                                                <a href="{{ route('users.permissions' , ['user'=> $user->id]) }}" class="btn btn-dark btn-sm ms-1">دسترسی</a>
                                                <a href="{{ route('users.addresses' , ['user'=> $user->id]) }}" class="btn btn-secondary btn-sm ms-1">آدرس</a>
                                                <a href="{{ route('login.user' , ['user'=> $user->id]) }}" class="btn btn-success btn-sm ms-1">ورود</a>
                                                <!-- dropdown //end -->
                                            </td>
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

        @foreach($users as $user)
                <!-- HTML for the modal -->
                <div class="modal fade" id="userDetail-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="userDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">مشخصات شخصی - {{ $user->username }}</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if($user->personalinfo)
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="UserName" class="form-label">نام نام خانوادگی</label>
                                            <input id="UserName" type="text" class="form-control" name="username" value="{{ $user->personalinfo->name }} - {{ $user->personalinfo->fname }}">
                                        </div>
                                        <div class="col-6">
                                            <label for="Name" class="form-label">شماره کارت</label>
                                            <input id="Name" type="text" class="form-control" name="Name" value="{{ $user->personalinfo->cartnumber }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="Melicode" class="form-label">کد ملی</label>
                                            <input id="Melicode" type="text" class="form-control" name="Melicode" value="{{ $user->personalinfo->melicode }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="Postalcode" class="form-label">کد پستی</label>
                                            <input id="Postalcode" type="text" class="form-control" name="Postalcode" value="{{ $user->personalinfo->postalcode }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="Address" class="form-label">آدرس شاخص</label>
                                            <textarea id="my-description" class="form-control" name="Address">{{ $user->personalinfo->address }}</textarea>
                                        </div>
                                        <div class=" d-flex">
                                            <span class="form-check-label"> فعال / غیر فعال </span>
                                            <input class="form-check-input ms-2" type="checkbox" name="verify"
                                                @if($user->personalinfo->is_verified == '1')
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
        @endforeach
@endsection
