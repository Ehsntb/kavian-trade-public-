@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست تیکت ها</h2>
                        <a href="{{ route('tickets.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>تیکت جدید</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>کارشناس</th>
                                    <th>کاربر</th>
                                    <th>عنوان</th>
                                    <th>وضعیت</th>
                                    <th>پاسخ</th>
                                    <th>کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)
                                    <tr class="text-center align-middle">
                                        <th>
                                            @if($ticket->ticketExpert)
                                                {{ $ticket->ticketExpert->username }}
                                            @else
                                                ثبت نشده!
                                            @endif
                                        </th>
                                        <th>
                                            @if($ticket->ticketUser)
                                                {{ $ticket->ticketUser->username }}
                                            @else
                                                ثبت نشده!
                                            @endif
                                        </th>
                                        <th>{{ $ticket->title }}</th>
                                        @if($ticket->is_active == 1)
                                            <th><span class="badge bg-success">فعال</span></th>
                                        @else
                                            <th><span class="badge bg-danger">غیر فعال</span></th>
                                        @endif
                                        @if($ticket->is_answered == 1)
                                            <th><span class="badge bg-success">پاسخ داده شده</span></th>
                                        @else
                                            <th><span class="badge bg-danger">پاسخ داده نشده</span></th>
                                        @endif
                                        <th class="">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <a href="{{ route('ticketschats.index' , ['ticket'=> $ticket->id]) }}" class="btn btn-sm btn-success">بخش گفتگو</a>
                                                </div>
                                                <div class="">
                                                    <form method="POST" action="{{ route('tickets.destroy' , ['ticket'=> $ticket->id]) }}">
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
