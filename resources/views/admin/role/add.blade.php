@extends('layouts.admin')

@section('title')
    <title>Thêm User</title>
@endsection
@section('css')
    <style>

    </style>
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])
        <form action="{{ route('users.store') }} " method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row m-2">

                        <div class="col-md-12">
                            @csrf
                            <div class="col-md-12">

                                <div class="form-group col-md-6">
                                    <label>Tên vai trò</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập ten user">

                                    {{-- <div class="col-md-6">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mô tả vai trò</label>
                                    <input type="text" class="form-control" name="display_name"
                                        placeholder="Nhập email User">
                                    {{-- <div class="col-md-6">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                </div>

                                {{-- add role --}}

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
