<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Xác nhận đơn hàng</title>
</head>

<body>
    <h1>Hi {{ $customers->name }}</h1>
    <p>Đơn hàng thành công.</p>
    <br>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>

                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($order->orderFlowers as $orderFlower)
                    <span>{{ $orderFlower->product_name }} </span>
                    <br>

                    <span>Số lượng: </span>
                    <span>{{ $orderFlower->quantity }} </span>
                    <br>
                    <br>

            </td>

            <td>{{ number_format($order->orderFlowers->sum(fn($orderFlower) => $orderFlower->price)) }}
                VNĐ
            </td>
            @endforeach
        </tbody>
    </table>
</body>

</html>
