@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست وزن ها</h2>
                        <a href="{{ route('weights.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>وزن جدید</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th class="col">مقدار</th>
                                    <th class="col">کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($weights as $weight)
                                    <tr class="text-center align-middle">
                                        <th>{{ $weight->amount }}</th>
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <a href="{{ route('weights.edit' , ['weight'=> $weight->id]) }}" class="btn btn-sm btn-success">ویرایش</a>
                                                </div>
                                                <div class="me-2">
                                                    <form method="POST" action="{{ route('weights.destroy' , ['weight'=> $weight->id]) }}">
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
