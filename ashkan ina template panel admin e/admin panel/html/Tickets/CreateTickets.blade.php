@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ایجاد تیکت جدید</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('tickets.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">انتخاب کاربر</label>
                                    <select class="form-control" name="user_id">
                                        @foreach(\App\Models\User::all() as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->username }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label for="Image" class="form-label">عنوان</label>
                                    <input  class="form-control" name="title" type="text">
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت تیکت
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
