@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش برند</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('brands.update', ['brand' => $brand->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="Title" class="form-label">عنوان</label>
                                    <input id="Title" type="text" class="form-control" name="title" value="{{ $brand->title }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="slug" class="form-label">slug</label>
                                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $brand->slug }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="Image" class="form-label">تصویر(331*110)</label>
                                    <input id="Image" type="file" class="form-control" name="image" value="{{ $brand->image }}">
                                    <img class="border border-6 mt-2" src="{{ $brand->image }}" height="150" width="150">
                                </div>

                                <div class="col-lg-12 d-flex align-items-center mt-3">
                                    <span class="form-check-label"> فعال / غیر فعال </span>
                                    <input id="verify" type="checkbox" class="form-check-input ms-2" name="Verify"
                                           @if($brand->is_active == '1')
                                               checked
                                        @endif
                                    >
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش برند
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

