@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title"> اضافه کردن شماره سریال پیگیری ({{ $order->orderserial }})</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Bulk.track.add', ['order' => $order->id]) }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">کد رهگیری</label>
                                    <input id="name" type="text" class="form-control" name="serial">
                                </div>
                                <div class="col-lg-6 d-flex">
                                    <button type="submit" class="mt-auto btn btn-primary">
                                        ثبت سریال
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
