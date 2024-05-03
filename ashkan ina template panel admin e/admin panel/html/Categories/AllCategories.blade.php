@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست دسته بندی ها</h2>
                        <a href="{{ route('categories.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>ایجاد دسته جدید</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('admin.layout.CategoriesGroup' , ['categories' => $categories])
                        </div>
                        <!-- table-responsive //end -->
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
