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
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Edit'])
        <form action="{{ route('products.update', ['id' => $product->id]) }} " method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row m-2">
                        <div class="col-md-12">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Giá sản phẩm</label>
                                        <input type="text" class="form-control" name="price"
                                            placeholder="Nhập giá sản phẩm" value="{{ $product->price }}">

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Ảnh đại diện</label>
                                        <input type="file" class="form-control-file" name="feature_image_path">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="{{ $product->feature_image_path }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Ảnh chi tiết</label>
                                        <input type="file" multiple class="form-control-file" name="image_path[]">
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach ($product->images as $image)
                                                    <div class="col-md-3">
                                                        <img class="product_image_150_100" src="{{ $image->image_path }}"
                                                            alt="">
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Chọn Danh Mục Sản Phẩm</label>
                                        <select class="form-control select2_category" name="category_id">
                                            <option value="">Danh mục sản phẩm</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nhập tag cho sản phâm</label>
                                        <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                                            @foreach ($product->tags as $tagItem)
                                                <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 height: 100px">
                            <div class="form-group">
                                <label>Nhập nôị dung</label>
                                <textarea name='contents' class="form-control tinymce_editor_init" rows="3">{{ $product->content }}</textarea>
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
    <script src="https://cdn.tiny.cloud/1/ykpc5bqrh846bhydsc9fvjetne67iuyxk7qczktwh9xvrb3g/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
