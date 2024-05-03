@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ایجاد اسلاید</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input id="title" type="text" class="form-control" name="title">
                                </div>

                                <div class="col-lg-6">
                                    <label for="short" class="form-label">توضیح کوتاه</label>
                                    <input id="short" type="text" class="form-control" name="short">
                                </div>

                                <div class="col-lg-6">
                                    <label for="long" class="form-label">توضیح کامل</label>
                                    <input id="long" type="text" class="form-control" name="long">
                                </div>

                                <div class="col-lg-6">
                                    <label for="image" class="form-label">تصویر</label>
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>

                                <div class="col-lg-6 d-flex align-items-center mt-3">
                                    <input class="form-check-input" type="checkbox" name="Verify"/>
                                    <span class="form-check-label ms-2"> فعال / غیر فعال </span>
                                </div>

                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        ثبت اسلاید
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
        $('#rolePermissions').select2({
            'placeholder' : 'دسترسی های مورد نظر را انتخاب کنید'
        })
    </script>

@endsection
