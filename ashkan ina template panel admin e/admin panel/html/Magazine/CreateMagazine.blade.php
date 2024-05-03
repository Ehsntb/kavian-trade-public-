@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ایجاد مجله جدید</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('magazine.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="title" class="form-label">عنوان مجله</label>
                                    <input id="title" type="text" class="form-control" name="title">
                                </div>

                                <div class="col-lg-4">
                                    <label for="Image" class="form-label">تصویر شاخص</label>
                                    <input id="Image" type="file" class="form-control" name="image">
                                </div>

                                <div class="col-lg-4">
                                    <label for="Short_description" class="form-label">توضیح کوتاه</label>
                                    <input id="Short_description" type="text" class="form-control" name="short_description">
                                </div>

                                <div class="col-lg-4">
                                    <label for="slug" class="form-label">اسلاگ جهت نمایش در URL</label>
                                    <input id="slug" type="text" class="form-control" name="slug">
                                </div>

                                <div class="col-lg-12">
                                    <label for="editor" class="form-label">توضیح کامل</label>
                                    <textarea id="editor" class="form-control text-end" name="long_description"></textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">دسته ها</label>
                                    <select id="categories" class="form-control" name="categories[]" multiple>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-lg-12 d-flex align-items-center mt-3">
                                    <input class="form-check-input" type="checkbox" name="Verify"/>
                                    <span class="form-check-label ms-2"> فعال / غیر فعال </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" name="is_special"/>
                                    <span class="form-check-label ms-2"> ویژه </span>
                                </label>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100">
                                        ثبت مجله
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
            $('#categories').select2({
                'placeholder' : 'دسته مورد نظر را انتخاب کنید'
            })
        </script>

        <script src="https://cdn.ckeditor.com/4.17.2/standard-all/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor', {
                language: 'fa',
                contentsLangDirection: 'rtl', // Set content direction to right-to-left
                filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            });
        </script>

@endsection
