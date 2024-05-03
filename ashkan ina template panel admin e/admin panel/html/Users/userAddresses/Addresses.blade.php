@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4>آدرس های کاربر - {{ $user->username }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">عنوان آدرس</th>
                                    <th scope="col">شماره تلفن</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($addresses as $address)
                                    <tr class="text-center align-middle">
                                        <td><b>{{ $address->title }}</b></td>
                                        <td>{{ $address->phone }}</td>
                                        @if($address->is_active)
                                            <th><span class="badge bg-success">فعال</span></th>
                                        @else
                                            <th><span class="badge bg-danger">غیرفعال</span></th>
                                        @endif
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addressDetail-{{ $address->id }}">جزئیات آدرس</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">
                                            کاربر آدرسی ثبت نکرده!
                                        </td>
                                    </tr>
                                @endforelse
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

    @foreach($addresses as $address)
        <!-- HTML for the modal -->
        <div class="modal fade" id="addressDetail-{{ $address->id }}" tabindex="-1" role="dialog" aria-labelledby="addressDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">جزئیات آدرس - {{ $address->title }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="title" class="form-label">عنوان آدرس</label>
                                    <input id="title" type="text" class="form-control" value="{{ $address->title }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="postalcode" class="form-label">کد پستی</label>
                                    <input id="postalcode" type="text" class="form-control" value="{{ $address->postalcode }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="phone" class="form-label">شماره تلفن</label>
                                    <input id="phone" type="text" class="form-control" value="{{ $address->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="Postalcode" class="form-label">توضیحات</label>
                                    <textarea class="form-control">{{ $address->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="Plaque" class="form-label">پلاک</label>
                                    <input id="Plaque" type="text" class="form-control" value="{{ $address->Plaque }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="floor" class="form-label">طبقه</label>
                                    <input id="floor" type="text" class="form-control" value="{{ $address->floor }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="unit" class="form-label">واحد</label>
                                    <input id="unit" type="text" class="form-control" value="{{ $address->unit }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <span class="form-check-label"> فعال / غیر فعال </span>
                            <input class="form-check-input ms-2" type="checkbox"
                                   @if($address->is_active == '1')
                                       checked
                                @endif
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
