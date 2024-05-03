@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش مجله</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('magazine.update' , ['magazine' => $magazine->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="title" class="form-label">عنوان مجله</label>
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $magazine->title }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="short_description" class="form-label">توضیح کوتاه</label>
                                    <input id="short_description" type="text" class="form-control" name="short_description" value="{{ $magazine->short_description }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="slug" class="form-label">اسلاگ جهت نمایش در URL</label>
                                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $magazine->slug }}">
                                </div>

                                <div class="col-lg-12   ">
                                    <label for="image" class="form-label">آپلود تصویر شاخص</label>
                                    <input id="image" type="text" class="form-control" value="{{ $magazine->image }}" disabled>
                                    <div class="p-2 bg-dark mt-1 mb-1 rounded-2">
                                        <img class="border border-6 mt-2" src="{{ $magazine->image }}" height="150" width="150">
                                    </div>
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>


                                <div class="col-lg-12">
                                    <label for="editor" class="form-label">توضیح کامل</label>
                                    <textarea id="editor" class="form-control" name="long_description">{{ $magazine->long_description }}</textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">دسته ها</label>
                                    <select id="categories" class="form-control" name="categories[]" multiple>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}" {{ in_array($category->id , $magazine->category->pluck('id')->toArray()) ?  'selected' : ''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-lg-12 d-flex align-items-center mt-3">
                                    <input id="verify" type="checkbox" class="form-check-input" name="Verify"
                                           @if($magazine->is_active == '1')
                                               checked
                                        @endif
                                    >
                                    <span class="form-check-label ms-2"> فعال / غیر فعال </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input id="Is_Special" type="checkbox" class="form-check-input" name="is_special"
                                           @if($magazine->is_special == '1')
                                               checked
                                        @endif
                                    >
                                    <span class="form-check-label ms-2">ویژه</span>
                                </label>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش مجله
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

    <script>
        $('#tags').select2({
            'placeholder' : 'تگ مورد نظر را انتخاب کنید'
        })
    </script>

@endsection
