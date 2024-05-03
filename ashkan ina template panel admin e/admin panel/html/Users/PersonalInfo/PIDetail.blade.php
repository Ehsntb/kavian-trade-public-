@extends('admin.layout.index')

@section('profilecontent')
    <section class="content-main" style="direction: rtl">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>مشخصات شخصی</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-4">
                                <label for="UserName" class="form-label">نام نام خانوادگی</label>
                                <input id="UserName" type="text" class="form-control" name="username" value="{{ $personal->name }} - {{ $personal->fname }}">
                            </div>
                            <div class="mb-4">
                                <label for="Name" class="form-label">شماره کارت</label>
                                <input id="Name" type="text" class="form-control" name="Name" value="{{ $personal->cartnumber }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="Melicode" class="form-label">کد ملی</label>
                                        <input id="Melicode" type="text" class="form-control" name="Melicode" value="{{ $personal->melicode }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label for="Postalcode" class="form-label">کد پستی</label>
                                        <input id="Postalcode" type="text" class="form-control" name="Postalcode" value="{{ $personal->postalcode }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="Address" class="form-label">آدرس شاخص</label>
                                <textarea id="my-description" class="form-control" name="Address">{{ $personal->address }}</textarea>
                            </div>
                            <label class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" name="verify"
                                   @if($personal->is_verified == '1')
                                       checked
                                   @endif
                                />
                                <span class="form-check-label"> فعال / غیر فعال </span>
                            </label>
                        </form>
                    </div>
                </div>
                <!-- card end// -->
            </div>
        </div>
    </section>
@endsection
