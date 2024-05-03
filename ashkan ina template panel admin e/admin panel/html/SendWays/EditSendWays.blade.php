@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش روش</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('sendways.update', ['sendway' => $sendway->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $sendway->title }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="editor" class="form-label">توضیح کامل</label>
                                    <textarea id="editor" class="form-control" name="description">{{ $sendway->description }}</textarea>
                                </div>

                                <div class="col-lg-6">
                                    <label for="price" class="form-label">هزینه</label>
                                    <input id="price" type="text" class="form-control" name="price" value="{{ $sendway->price }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="image" class="form-label">تصویر</label>
                                    <input id="image" type="file" class="form-control" name="image" value="{{ $sendway->image }}">
                                    <img class="border border-6 mt-2" src="{{ $sendway->image }}" height="150" width="150">
                                </div>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input id="verify" type="checkbox" class="form-check-input" name="Verify"
                                           @if($sendway->is_active == '1')
                                               checked
                                        @endif
                                    >
                                    <span class="form-check-label ms-2"> فعال / غیر فعال </span>
                                </label>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش روش
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

    <script src="https://cdn.ckeditor.com/4.17.2/standard-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor', {
            language: 'fa',
            contentsLangDirection: 'rtl', // Set content direction to right-to-left
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
        });
    </script>

@endsection
