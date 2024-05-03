@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">همه اسلاید ها</h2>
                        <div class="me-auto">
                            <a href="{{ route('sliders.create') }}" class="btn btn-success"><i class="fa fa-plus me-2"></i>اسلاید جدید</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>ایجاد کننده</th>
                                    <th>عنوان</th>
                                    <th>تصویر</th>
                                    <th>وضعیت</th>
                                    <th>کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slide)
                                    <tr class="text-center align-middle">
                                        <th>
                                            {{ $slide->user->username }}
                                        </th>
                                        <th>{{ $slide->title }}</th>
                                        <th><img src="{{ $slide->image }}" class="border border-warning" style="width: 100px; height: 100px"></th>
                                        @if($slide->is_active)
                                            <th><span class="badge bg-success">فعال</span></th>
                                        @else
                                            <th><span class="badge bg-danger">غیر فعال</span></th>
                                        @endif
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <a href="{{ route('sliders.edit' , ['slider'=> $slide->id]) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                                </div>
                                                <div class="">
                                                    <form method="POST" action="{{ route('sliders.destroy' , ['slider'=> $slide->id]) }}">
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
