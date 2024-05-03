@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">تنظیمات ازگیل شاپ</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead class="text-center">
                                <tr>
                                    <th class="col">نام ستون</th>
                                    <th class="col">محتوا</th>
                                    <th class="col">اندازه</th>
                                    <th class="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center align-middle">
                                    <th>Logo</th>
                                    <th>
                                        <img src="{{ $azgilinfo->logo }}" style="height:100px ;width:100px">
                                    </th>
                                    <th>
                                        1 * 1
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.Logo') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="logo">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.Logo.Del') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th>banner1</th>
                                    <th>
                                        <img src="{{ $azgilinfo->banner1 }}" style="height:100px ;width:100px">
                                    </th>
                                    <th>
                                        1645 * 105
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner1') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="banner1">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner1.Del') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th>banner2</th>
                                    <th>
                                        <img src="{{ $azgilinfo->banner2 }}" style="height:100px ;width:100px">
                                    </th>
                                    <th>
                                        272 * 406
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner2') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="banner2">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner2.Del') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>banner3</th>
                                    <th>
                                        <img src="{{ $azgilinfo->banner3 }}" style="height:100px ;width:100px">
                                    </th>
                                    <th>
                                        272 * 406
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner3') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="banner3">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner3.Del') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>banner4</th>
                                    <th>
                                        <img src="{{ $azgilinfo->banner4 }}" style="height:100px ;width:100px">
                                    </th>
                                    <th>
                                        272 * 406
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner4') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="banner4">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner4.Del') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>banner5</th>
                                    <th>
                                        <img src="{{ $azgilinfo->banner5 }}" style="height:100px ;width:100px">
                                    </th>
                                    <th>
                                        272 * 406
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner5') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="banner5">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.banner5.Del') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>view_count</th>
                                    <th>
                                        <label>{{ $azgilinfo->view_count }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.view_count') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="view_count">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.view_count.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>sale_count</th>
                                    <th>
                                        <label>{{ $azgilinfo->sale_count }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.sale_count') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="sale_count">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.sale_count.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>address1</th>
                                    <th>
                                        <label>{{ $azgilinfo->address1 }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.address1') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="address1">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.address1.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>address2</th>
                                    <th>
                                        <label>{{ $azgilinfo->address2 }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.address2') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="address2">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.address2.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>phone1</th>
                                    <th>
                                        <label>{{ $azgilinfo->phone1 }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.phone1') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="phone1">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.phone1.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>phone2</th>
                                    <th>
                                        <label>{{ $azgilinfo->phone2 }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.phone2') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="phone2">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.phone2.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>email1</th>
                                    <th>
                                        <label>{{ $azgilinfo->email1 }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.email1') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="email1">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.email1.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th>email2</th>
                                    <th>
                                        <label>{{ $azgilinfo->email2 }}</label>
                                    </th>
                                    <th>---</th>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.email2') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="email2">
                                                    <button type="submit" class="btn btn-sm btn-success me-1">تنظیم</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('azgilinfo.email2.Del') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger me-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
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

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">درباره ما</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('azgilinfo.aboutUs') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="my-description" class="form-label">توضیح کوتاه</label>
                                    <textarea class="form-control" name="short">{{ $azgilinfo->short }}</textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label for="my-description" class="form-label">بند دوم</label>
                                    <textarea id="editor" class="form-control text-right" name="long">{{ $azgilinfo->long }}</textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label for="my-description" class="form-label">تصویر شاخص درباره ما (667 * 951.5)</label>
                                    <input id="title" type="file" class="form-control" name="image">
                                    <img class="form-control mt-2" src="{{ $azgilinfo->image }}" style="height: 200px;width: 200px">
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت درباره ما
                                    </button>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('Del-AboutUs').submit()" class="btn btn-danger">حذف</a>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('azgilinfo.aboutUs.Del') }}" method="POST" id="Del-AboutUs">
                            @csrf
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">سوشال مدیا</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('azgilinfo.socialMedia') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="title" class="form-label">تلگرام</label>
                                    <input id="title" type="text" class="form-control" name="instagram" value="{{ $azgilinfo->instagram }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="title" class="form-label">اینستاگرام</label>
                                    <input id="title" type="text" class="form-control" name="telegram" value="{{ $azgilinfo->telegram }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="title" class="form-label">واتساپ</label>
                                    <input id="title" type="text" class="form-control" name="whatsapp" value="{{ $azgilinfo->whatsapp }}">
                                </div>

                                <div class="col-lg-4 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت شبکه های اجتماعی
                                    </button>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('Del-socialMedia').submit()" class="btn btn-danger">حذف</a>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('azgilinfo.socialMedia.Del') }}" method="POST" id="Del-socialMedia">
                            @csrf
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
