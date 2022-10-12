@extends('layouts.admin')

@section('title')
    <title>Sản phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('admins/product/index/list.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Thêm Sản Phẩm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục sản phẩm</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} VND</td>
                                        <td>
                                            <img class="product_image_150_100" style="height: 70px; width: 70px;"
                                                src="{{ $product->feature_image_path }}" alt="">
                                        </td>
                                        <td>{{ optional($product->category)->name }}</td>
                                        <td>{{ $product->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                                class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm delete"
                                                data-url="{{ route('products.delete', ['id' => $product->id]) }}"
                                                href="">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admins/product/index/list.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
