@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش دسته بندی</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('categories.update' , $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">عنوان دسته بندی</label>
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $category->name }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="slug" class="form-label">اسلاگ جهت نمایش در URL</label>
                                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                                </div>

                                @if(! $Cat)
                                    <div class="col-lg-12">
                                        <label for="image" class="form-label">تصویر دسته مادر</label>
                                        <input id="image" type="file" class="form-control" name="image" value="{{ $category->image }}">
                                        <img src="{{ $category->image }}" style="width: 150px; height: 150px;">
                                    </div>
                                @endif

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش دسته
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
