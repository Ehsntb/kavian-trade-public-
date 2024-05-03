@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش اسلاید</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('sliders.update', ['slider' => $slider->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="short" class="form-label">توضیح کوتاه</label>
                                    <input id="short" type="text" class="form-control" name="short" value="{{ $slider->short }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="long" class="form-label">توضیح کامل</label>
                                    <input id="long" type="text" class="form-control" name="long" value="{{ $slider->long }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="image" class="form-label">تصویر</label>
                                    <input id="image" type="file" class="form-control" name="image" value="{{ $slider->image }}">
                                    <img src="{{ $slider->image }}" style="height: 150px; width: 150px">
                                </div>

                                <div class="col-lg-6 d-flex align-items-center">
                                    <span class="form-check-label"> فعال / غیر فعال </span>
                                    <input id="verify" type="checkbox" class="form-check-input" name="Verify"
                                           @if($slider->is_active == '1')
                                               checked
                                        @endif
                                    >
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش اسلاید
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

