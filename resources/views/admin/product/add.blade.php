@extends('layouts.admin')

@section('title')
    <title>Thêm Sản Phẩm</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <form action="{{ route('products.store') }} " method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row m-2">

                        <div class="col-md-12">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                        <div class="col-md-6">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Giá sản phẩm</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">

                                        <div class="col-md-6">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Ảnh đại diện</label>
                                        <input type="file" accept="image/*" class="form-control-file"
                                            name="feature_image_path">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Ảnh chi tiết</label>
                                        <input type="file" multiple accept="image/*" class="form-control-file"
                                            name="image_path[]">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Chọn Danh Mục Sản Phẩm</label>
                                        <select class="form-control select2_category @error('price') is-invalid @enderror"
                                            name="category_id" value="{{ old('category_id') }}">
                                            <option value="">Danh mục sản phẩm</option>
                                            {!! $htmlOption !!}
                                        </select>
                                        <div class="col-md-6">
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nhập tag cho sản phâm</label>
                                        <select class="form-control tags_select_choose @error('tags') is-invalid @enderror"
                                            name="tags[]" multiple="multiple">

                                        </select>
                                        <div class="col-md-6">
                                            @error('tags')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 p-3">
                            <div class="form-group">
                                <label>Nhập nôị dung</label>
                                <textarea name='contents' class="form-control tinymce_editor_init @error('contents') is-invalid @enderror"
                                    rows="3">
                                </textarea>
                                <div class="col-md-6">
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/ykpc5bqrh846bhydsc9fvjetne67iuyxk7qczktwh9xvrb3g/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
