@extends('layouts.admin')

@section('title')
    <title>Trang Chủ</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thống kê</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>
                                    {{ $orders->count() }}
                                    <i class="fa-sharp fa-solid fa-bag-shopping fa-sm"></i>
                                </h3>
                                <p>Đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('orderDetails.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $total }}
                                    <i class="fa-sharp fa-solid fa-money-check-dollar fa-sm"></i>
                                </h3>
                                <p>Doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('orderDetails.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $ratingAvg }}
                                    <i class="fa-sharp fa-solid fa-star fa-sm"></i>
                                </h3>
                                <p>Đánh giá trung bình</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $users->count() }}
                                    <i class="fa-solid fa-user fa-sm"></i>
                                </h3>
                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Lượt đánh giá</span>
                                <span class="info-box-number">{{ $rating->count() }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Danh mục sản phẩm</span>
                                <span class="info-box-number">{{ $categories->count() }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sản phẩm đã đăng</span>
                                <span class="info-box-number">{{ $products->count() }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Số lượt đánh giá 5 sao</span>
                                <span class="info-box-number">{{ $rating5->count() }}</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                </div>
            </div>

        </div>
    </div>
@endsection
