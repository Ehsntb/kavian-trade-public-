@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ایجاد برند جدید</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input id="title" type="text" class="form-control" name="title">
                                </div>

                                <div class="col-lg-6">
                                    <label for="slug" class="form-label">slug</label>
                                    <input id="slug" type="text" class="form-control" name="slug">
                                </div>

                                <div class="col-lg-6">
                                    <label for="image" class="form-label">تصویر</label>
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>

                                <label class="col-lg-6 d-flex align-items-center">
                                    <span class="form-check-label"> فعال / غیر فعال </span>
                                    <input class="form-check-input ms-3" type="checkbox" name="Verify"/>
                                </label>

                                <div class="col-lg-6 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت برند
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
