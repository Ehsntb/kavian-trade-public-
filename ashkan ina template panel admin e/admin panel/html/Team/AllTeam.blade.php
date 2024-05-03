@extends('AdminPanel.layout.index')

@section('profilecontent')
    @can('show-roles')
        <div>
            <div>
                <div class="">
                    <div class="d-flex">
                        <form>
                            <div class="input-group">
                                <div>
                                    <input type="text" class="form-control" placeholder="نام عضو را وارد کنید" name="search" value="{{ request('search') }}">
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">جستجو</button>
                                </div>
                            </div>
                        </form>
                        <div>
                            @can('add-role')
                                <a class="btn btn-warning me-2" href="{{ route('teams.create') }}">ایجاد عضو جدید</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <br>
                <table class="table text-center table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>آی دی</th>
                        <th>نام</th>
                        <th>نقش</th>
                        <th>لینک اینستا</th>
                        <th>لینک تلگرام</th>
                        <th>لینک واتساپ</th>
                        <th>تصویر شاخص</th>
                        <th>کارها</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr class="text-center align-middle">
                            <th>{{ $team->id }}</th>
                            <th>{{ $team->name }}</th>
                            <th>{{ $team->role }}</th>
                            <th>{{ $team->instagram }}</th>
                            <th>{{ $team->telegram }}</th>
                            <th>{{ $team->whatsapp }}</th>
                            <th><img src="{{ $team->image }}" style="width: 100px;height: 100px;"></th>
                            <th class="">
                                <div class="d-flex justify-content-center">
                                    @can('edit-role')
                                        <div class="">
                                            <a href="{{ route('teams.edit' , ['team'=> $team->id]) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                        </div>
                                    @endcan
                                    @can('delete-role')
                                        <div class="">
                                            <form method="POST" action="{{ route('teams.destroy' , ['team'=> $team->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger me-1">
                                                    حذف
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcan
@endsection
