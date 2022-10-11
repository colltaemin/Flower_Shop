@extends('layouts.admin')

@section('title')
    <title>Sửa Role</title>
@endsection
@section('css')
    <style>
        input[type="checkbox"] {
            transform: scale(1.2);
        }
    </style>
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('roles.update', ['id' => $role->id]) }} " method="post"
                        enctype="multipart/form-data" style="width: 100%">
                        <div class="col-md-12">
                            @csrf
                            <div class="col-md-12">

                                <div class="form-group col-md-12">
                                    <label>Tên vai trò</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                                        value="{{ $role->name }}">

                                    {{-- <div class="col-md-6">
                                                    @error('price')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Mô tả vai trò</label>
                                    <input type="text" class="form-control" name="display_name"
                                        placeholder="Nhập mô tả vai trò" value="{{ $role->display_name }}">
                                    {{-- <div class="col-md-6">
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            <input type="checkbox" value="" class="checkbox_all">
                                            Tất cả
                                        </label>
                                    </div>
                                    @foreach ($permissionsParent as $permissionsParentItem)
                                        <div class="card border-primary col-md-12 mb-3">
                                            <div class="card-header">
                                                <label for="">
                                                    <input type="checkbox" value="" class="checkbox_wrapper">
                                                    {{ $permissionsParentItem->name }}
                                                </label>
                                            </div>

                                            <div class="form-row">
                                                @foreach ($permissionsParentItem->permissionsChild as $permissionsChildItem)
                                                    <div class="card-body text-primary col-md-3">
                                                        <h5 class="card-title">
                                                            <label for="">
                                                                <input type="checkbox" name="permissions_id[]"
                                                                    {{ $permissionsChecked->contains($permissionsChildItem->id) ? 'checked' : '' }}
                                                                    value="{{ $permissionsChildItem->id }}"
                                                                    class="checkbox_child">
                                                                {{ $permissionsChildItem->name }}
                                                            </label>
                                                        </h5>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
        $('.checkbox_wrapper').on('click', function() {
            $(this).parents('.card').find('.checkbox_child').prop('checked', $(this).prop('checked'));
        });
        $('.checkbox_all').on('click', function() {
            $('.checkbox_child').prop('checked', $(this).prop('checked'));
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/ykpc5bqrh846bhydsc9fvjetne67iuyxk7qczktwh9xvrb3g/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
