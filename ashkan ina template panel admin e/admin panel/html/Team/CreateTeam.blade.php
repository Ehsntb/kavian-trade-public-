@extends('AdminPanel.layout.index')

@section('profilecontent')
    <div class="row justify-content-center p-1 m-1">

        @include('AdminPanel.layout.errors')

        <div class="col-md-12">
            <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-center">نام نام خانوادگی</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="label" class="col-md-4 col-form-label text-center">نقش</label>

                    <div class="col-md-6">
                        <input id="label" type="text" class="form-control" name="role">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="label" class="col-md-4 col-form-label text-center">اینستاگرام</label>

                    <div class="col-md-6">
                        <input id="label" type="text" class="form-control" name="instagram">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="label" class="col-md-4 col-form-label text-center">تلگرام</label>

                    <div class="col-md-6">
                        <input id="label" type="text" class="form-control" name="telegram">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="label" class="col-md-4 col-form-label text-center">واتساپ</label>

                    <div class="col-md-6">
                        <input id="label" type="text" class="form-control" name="whatsapp">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="label" class="col-md-4 col-form-label text-center">تصویر شاخص</label>

                    <div class="col-md-6">
                        <input id="label" type="file" class="form-control" name="image">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary w-100">
                            ثبت غضو
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
