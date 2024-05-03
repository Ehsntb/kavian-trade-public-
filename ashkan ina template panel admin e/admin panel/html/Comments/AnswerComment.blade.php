@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">پاسخ به نظر</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <label for="product-description" class="form-label">نظر کاربر</label>
                            <textarea id="product-description" class="form-control" name="description">{{ $comment->comment }}</textarea>
                        </div>
                        <form method="POST" action="{{ route('comments.setanswer' , ['comment' => $comment->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="product-description" class="form-label">پاسخ</label>
                                    <textarea id="product-description" class="form-control" name="comment_answer"></textarea>
                                </div>

                                <div class="col-lg-6 d-flex mt-3">
                                    <button type="submit" class="btn btn-primary mt-auto">
                                        ثبت پاسخ
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
