@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">لیست نظرات</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>ایجاد کننده</th>
                                    <th>محصول</th>
                                    <th>پاسخ</th>
                                    <th>ویژه</th>
                                    <th>وضعیت انتشار</th>
                                    <th>بازخورد مثبت</th>
                                    <th>بازخورد منفی</th>
                                    <th>کارها</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr class="text-center align-middle">
                                        <th>{{ $comment->user->username }}</th>
                                        <th>{{ $comment->product->title }}</th>

                                        @if($comment->comment_answer == null)
                                            <th><span class="badge bg-danger">عدم پاسخ</span></th>
                                        @else
                                            <th><span class="badge bg-success">پاسخ داده شده</span></th>
                                        @endif
                                        @if($comment->is_special == 1)
                                            <th><span class="badge bg-success">Ok</span></th>
                                        @else
                                            <th><span class="badge bg-danger">No</span></th>
                                        @endif
                                        @if($comment->is_active == 1)
                                            <th><span class="badge bg-success">منتشر شده</span></th>
                                        @else
                                            <th><span class="badge bg-danger">در انتظار تائید</span></th>
                                        @endif
                                        <th>{{ $comment->like }}</th>
                                        <th>{{ $comment->dislike }}</th>
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                <div>
                                                    @if($comment->comment_answer == null)
                                                        <a href="{{ route('comments.answer' , ['comment'=> $comment->id]) }}" class="btn btn-sm btn-success">پاسخ</a>
                                                    @endif
                                                </div>
                                                <div>
                                                    <form method="POST" action="{{ route('comments.activate', $comment->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-warning ms-1">تغییر وضعیت انتشار</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <form method="POST" action="{{ route('comments.special', $comment->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-warning ms-1">تغییر وضعیت ویژه</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <form method="POST" action="{{ route('comments.delete', $comment->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-danger ms-1">حذف نظر</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <form method="POST" action="{{ route('comments.delete.answer', $comment->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-danger ms-1">حذف پاسخ</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    @if($comment->comment_answer != null)
                                                        <div class="me-1">
                                                            <a href="{{ route('comments.edit' , ['comment'=> $comment->id]) }}" class="btn btn-sm btn-success ms-1">ویرایش پاسخ</a>
                                                        </div>
                                                    @endif
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
