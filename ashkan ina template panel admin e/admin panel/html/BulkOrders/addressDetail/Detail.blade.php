@extends('admin.layout.index')

@section('profilecontent')

    <section class="content-main">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4> جزئیات آدرس ({{ $user->username }})</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-4">
                                <label for="name" class="form-label">نام</label>
                                <input id="name" type="text" class="form-control" value="{{ $user->personalinfo->name }}">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label">نام خانوادگی</label>
                                <input id="name" type="text" class="form-control" value="{{ $user->personalinfo->fname }}">
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label">آدرس</label>
                                <textarea id="address" type="text" class="form-control">{{ $user->personalinfo->address }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="form-label">شماره تلفن</label>
                                <input id="phone" type="text" class="form-control" value="{{ $user->phone }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="postalcode" class="form-label">کد پستی</label>
                                        <input id="postalcode" type="text" class="form-control" value="{{ $user->personalinfo->postalcode }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="cartnumber" class="form-label">شماره کارت</label>
                                        <input id="cartnumber" type="text" class="form-control" value="{{ $user->personalinfo->cartnumber }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="Plaque" class="form-label">کد ملی</label>
                                        <input id="Plaque" type="text" class="form-control" name="Plaque" value="{{$user->personalinfo->melicode }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="shaba" class="form-label">شماره شبا</label>
                                <input id="shaba" type="number" class="form-control" value="{{ $user->personalinfo->shaba }}">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- card end// -->
            </div>
        </div>
    </section>

@endsection
