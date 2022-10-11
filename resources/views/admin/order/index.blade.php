@extends('layouts.admin')

@section('title')
    <title>Đơn hàng</title>
@endsection

@section('css')
    <link href="{{ asset('admins/product/index/list.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Order', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>

                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Tên người nhận</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Lời nhắn [Cho người nhận]</th>
                                    <th scope="col">Lời nhắn [Cho người gửi]</th>
                                    <th scope="col">Thời gian giao hàng</th>
                                    <th scope="col">Ngày tạo</th>

                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th class="col-0" scope="row">{{ $order->id }}</th>

                                        <td class="col-1">

                                            @foreach ($order->orderFlowers as $orderFlower)
                                                <span>{{ $orderFlower->product_name }} </span>
                                                <br>

                                                <span>Số lượng: </span>
                                                <span>{{ $orderFlower->quantity }} </span>
                                                <br>
                                                <br>
                                            @endforeach

                                        </td>

                                        <td class="col-1">
                                            {{ number_format($order->orderFlowers->sum(fn($orderFlower) => $orderFlower->price)) }}
                                            VNĐ
                                        </td>

                                        <td class="col-1">{{ $order->name }}</td>
                                        <td class="col-1">{{ $order->phone }}</td>
                                        <td class="col-1"> {{ $order->address }} {{ $order->district }}</td>
                                        <td class="col-1">{{ $order->message }}</td>
                                        <td class="col-1">{{ $order->note }}</td>
                                        <td class="col-1">{{ $order->shipped_at }}</td>
                                        <td class="col-1">{{ $order->created_at->diffForHumans() }}</td>
                                        <td class="col-1">
                                            @if ($order->paid_at == 'Thanh toán khi nhận hàng' || $order->paid_at == null)
                                                <span class="badge badge-warning">Chưa thanh toán</span>
                                            @else
                                                <span class="badge badge-success">Đã thanh toán</span>
                                            @endif
                                        </td>

                                        <td class="col-1" id="confirm_order">
                                            <form action="{{ route('orders.storeStatus') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                                <input type="hidden" name="status" value="solved">
                                                @if ($order->status == 'solved')
                                                    <button type="submit" class="btn btn-success">Đã duyệt</button>
                                                @else
                                                    <button type="submit" class="btn btn-primary">Duyệt</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script></script>
@endsection
