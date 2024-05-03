@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4>ویرایش دسترسی کاربر - {{ $user->username }}</h4>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('users.permissions.store' , $user->id) }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="form-label">مقام ها</label>
                                    <select id="rolesss" class="form-control" name="roles[]" multiple>
                                        @foreach(\App\Models\Role::all() as $role)
                                            <option value="{{ $role->id }}" {{ in_array($role->id , $user->role->pluck('id')->toArray()) ?  'selected' : ''}}>{{ $role->name }} - {{ $role->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">دسترسی ها</label>
                                    <select id="permissionsss" class="form-control" name="permissions[]" multiple>
                                        @foreach(\App\Models\Permission::all() as $permission)
                                            <option value="{{ $permission->id }}" {{ in_array($permission->id , $user->permission->pluck('id')->toArray()) ?  'selected' : ''}}>{{ $permission->name }} - {{ $permission->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary mt-3">
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
        console.log($('#rolesss') , $('#permissionsss'))
        $('#rolesss').select2({

        })
        $('#permissionsss').select2({

        })
    </script>

@endsection
