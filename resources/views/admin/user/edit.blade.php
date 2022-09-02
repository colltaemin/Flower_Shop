@extends('layouts.admin')

@section('title')
    <title>Edit User</title>
@endsection
@section('css')
    <style>

    </style>
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'User', 'key' => 'Edit'])
        <form action="{{ route('users.update', ['id' => $user->id]) }} " method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row m-2">

                        <div class="col-md-12">
                            @csrf
                            <div class="col-md-12">

                                <div class="form-group col-md-6">
                                    <label>Tên User</label>
                                    <input type="" class="form-control" name="name" placeholder="Nhập ten user"
                                        value="{{ $user->name }}">

                                    {{-- <div class="col-md-6">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email User"
                                        value="{{ $user->email }}">
                                    {{-- <div class="col-md-6">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">

                                    {{-- <div class="col-md-6">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                </div>

                                {{-- add role --}}
                                <div class="form-group col-md-6">
                                    <label>Role</label>
                                    <select name="role_id[]" class="form-control select2_init" multiple>
                                        <option value=""></option>
                                        @foreach ($roles as $role)
                                            <option {{ $user->roles->contains($role->id) ? 'selected' : '' }}
                                                value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>
        </form>
    </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
        $('.select2_init').select2({
            placeholder: 'Chọn vai trò cho user',
            allowClear: true

        });
    </script>
    <script src="https://cdn.tiny.cloud/1/ykpc5bqrh846bhydsc9fvjetne67iuyxk7qczktwh9xvrb3g/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
