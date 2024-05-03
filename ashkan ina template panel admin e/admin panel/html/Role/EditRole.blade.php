@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش مقام</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('role.update' , ['role' => $role->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">نام</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="label" class="form-label">توضیح</label>
                                    <input id="label" type="text" class="form-control" name="label" value="{{ $role->label }}">
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">دسترسی ها</label>
                                    <select id="permissions" class="form-control" name="permissions[]" multiple>
                                        @foreach(\App\Models\Permission::all() as $permission)
                                            <option value="{{ $permission->id }}" {{ in_array($permission->id , $role->permission->pluck('id')->toArray()) ?  'selected' : ''}}>{{ $permission->name }} - {{ $permission->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت مقام
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

@section('script')

    <script>
        $('#permissions').select2({
            'placeholder' : 'دسترسی های مورد نظر را انتخاب کنید'
        })
    </script>

@endsection
