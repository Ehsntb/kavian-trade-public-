@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش دسترسی</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('permission.update' , ['permission' => $permission->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">نام</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $permission->name }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="label" class="form-label">توضیح</label>
                                    <input id="label" type="text" class="form-control" name="label" value="{{ $permission->label }}">
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت دسترسی
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
