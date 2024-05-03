@extends('admin.layout.index')

@section('profilecontent')
    <section class="content-main" style="direction: rtl">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title"></h2>
            </div>
        </div>
        <div class="card p-3">

        </div>
    </section>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">پیام های تیکت - {{ $ticket->title }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                @foreach($chats as $chat)
                                    @if($chat->user->id == auth()->user()->id)
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="d-flex align-items-center p-2 me-2">
                                                <div class="ms-2 d-flex p-2">
                                                    @if($chat->user->personalinfo)
                                                        {{ $chat->user->personalinfo->name }} - {{ $chat->user->personalinfo->fname }}
                                                    @else
                                                        {{ $chat->user->username }}
                                                    @endif
                                                </div>
                                                <div class=""><strong>{{ jdate($chat->created_at) }}</strong></div>
                                            </div>
                                            <div class="p-2">
                                                <div class="w-25 p-3" style="border-radius: 30px 30px 0px 30px;border: 3px solid black !important;">
                                                    {{ $chat->chat }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="d-flex align-items-center p-2 me-2 justify-content-end">
                                                <div class=""><strong>{{ jdate($chat->created_at) }}</strong></div>
                                                <div class="ms-2 d-flex p-2">
                                                    @if($chat->user->personalinfo)
                                                        {{ $chat->user->personalinfo->name }} - {{ $chat->user->personalinfo->fname }}
                                                    @else
                                                        {{ $chat->user->username }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center p-2 me-2 justify-content-end">
                                                <div class="w-25 p-3" style="border-radius: 0px 30px 30px 30px;border: 3px solid black !important;">
                                                    {{ $chat->chat }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form class="row" method="POST" action="{{ route('ticketschats.sendmessage' , ['ticket' => $ticket->id]) }}">
                            @csrf
                            <div class="col-lg-10">
                                <input name="chat" class="form-control w-100 h-100" type="text" placeholder="ارسال پیام">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-dark w-100 h-100 justify-content-center">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

