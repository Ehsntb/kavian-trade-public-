@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست مجله ها</h2>
                        <a href="{{ route('magazine.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>مجله جدید</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>ایجاد کننده</th>
                                    <th>عنوان مجله</th>
                                    <th>وضعیت</th>
                                    <th>ویژه</th>
                                    <th>توضیح کوتاه</th>
                                    <th>مقدار بازدید</th>
                                    <th>کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($magazines as $magazine)
                                    <tr class="text-center align-middle">
                                        <th>{{ $magazine->user->username }}</th>
                                        <th>{{ $magazine->title }}</th>
                                        @if($magazine->is_active == 1)
                                            <th><span class="badge bg-success">فعال</span></th>
                                        @else
                                            <th><span class="badge bg-danger">غیر فعال</span></th>
                                        @endif
                                        @if($magazine->is_special == 1)
                                            <th><span class="badge bg-success">Ok</span></th>
                                        @else
                                            <th><span class="badge bg-danger">No</span></th>
                                        @endif
                                        <th>{{ Str::limit($magazine->short_description, 30, '...') }}</th>
                                        <th>{{ $magazine->view_count }}</th>
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <a href="{{ route('magazine.edit' , ['magazine'=> $magazine->id]) }}" class="btn btn-sm btn-success">ویرایش</a>
                                                </div>
                                                <form method="POST" action="{{ route('magazine.activate', $magazine->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-warning ms-1">وضعیت</button>
                                                </form>
                                                <div class="">
                                                    <form method="POST" action="{{ route('magazine.destroy' , ['magazine'=> $magazine->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger ms-1">
                                                            حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
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
@endsection
