@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست مقام ها</h2>
                        <a href="{{ route('role.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>ایجاد مقام جدید</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>عنوان</th>
                                    <th>توضیح کوتاه</th>
                                    <th>کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr class="text-center align-middle">
                                        <th>{{ $role->name }}</th>
                                        <th>{{ $role->label }}</th>
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <a href="{{ route('role.edit' , ['role'=> $role->id]) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                                </div>
                                                <div class="">
                                                    <form method="POST" action="{{ route('role.destroy' , ['role'=> $role->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger ms-1">
                                                            حذف مقام
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
