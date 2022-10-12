<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đặt hàng</title>
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('home/header/header.css') }}">
    @yield('css')
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <x-header>

    </x-header>

    <div class="wrapper">

        <div class="container">

            <div class="col-12 row">
                <div class="col-md-12" style="text-align: left">
                    <form action="{{ route('orders.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="person-buy">
                            <h5>Thông tin người mua</h5>

                            <div class="row m-2">
                                <div class="col-3 m-1">
                                    <label>
                                        <span class="req">*</span>Họ và tên:
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" placeholder="Vui lòng nhập họ tên"
                                        aria-label="default input example" name="name_buy"
                                        @error('name_buy') is-invalid @enderror>

                                    </label>
                                    @error('name_buy')
                                        <div class="text-danger m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col-3 m-1">
                                    <label>
                                        <span class="req">*</span>Số điện thoại:
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="number" placeholder="Vui lòng nhập số điện thoại"
                                        aria-label="default input example" name="phone_buy"
                                        @error('phone_buy') is-invalid @enderror>

                                    @error('phone_buy')
                                        <div class="text-danger m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col-3 m-1">
                                    <label>
                                        <span class="req">*</span>Email:
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="email" placeholder="Vui lòng nhập email"
                                        aria-label="default input example" name="email"
                                        @error('email') is-invalid @enderror>
                                    <label for="" class="m-2" data-invalid="Email không hợp lệ"
                                        data-valid="Email hợp lệ"></label>
                                    </label>

                                    @error('email')
                                        <div class="text-danger m-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="person-take">
                            <h5>Thông tin người nhận</h5>
                            <div class="form">
                                <div class="row m-2">
                                    <div class="col-3 m-1">
                                        <label>
                                            <span class="req">*</span>Họ và tên:
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="text" placeholder="Vui lòng nhập họ tên"
                                            aria-label="default input example" name="name"
                                            @error('name') is-invalid @enderror>

                                        @error('name')
                                            <div class="text-danger m-2">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>
                                <div class="row m-2">
                                    <div class="col-3 m-1">
                                        <label>
                                            <span class="req">*</span>Số điện thoại:
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="number"
                                            placeholder="Vui lòng nhập số điện thoại" aria-label="default input example"
                                            name="phone" @error('phone') is-invalid @enderror>

                                        @error('phone')
                                            <div class="text-danger m-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row m-2">
                                    <div class="col-3 m-1">
                                        <label>
                                            <span class="req">*</span>Địa chỉ:
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="text" placeholder="Vui lòng nhập địa chỉ"
                                            aria-label="default input example" name="address"
                                            @error('address') is-invalid @enderror>

                                        @error('address')
                                            <div class="text-danger m-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row m-2">
                                    <div class="col-3 m-1">
                                        <label>
                                            <span class="req">*</span>Tỉnh/thành phố:
                                        </label>
                                    </div>
                                    <div class="col-8">

                                        <select class="form-select" aria-label="Default select example"
                                            name="province">
                                            <option selected>Thành phố Hồ Chí Minh</option>
                                            @error('province')
                                                <div class="text-danger m-2">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-3 m-1">
                                        <label>
                                            <span class="req">*</span>Quận/Huyện:
                                        </label>

                                    </div>
                                    <div class="col-8">

                                        <select class="form-select" aria-label="Default select example"
                                            name="district" @error('district') is-invalid @enderror>
                                            <option selected></option>
                                            <option>Quận 1</option>
                                            <option>Quận 2</option>
                                            <option>Quận 3</option>
                                            <option>Quận 4</option>
                                            <option>Quận 5</option>
                                            <option>Quận 6</option>
                                            <option>Quận 7</option>
                                            <option>Quận 8</option>
                                            <option>Quận 9</option>
                                            <option>Quận 10</option>
                                            <option>Quận 11</option>
                                            <option>Quận 12</option>
                                            <option>Quận Tân Bình</option>
                                            <option>Quận Phú Nhuận</option>
                                            <option>Quận Gò Vấp</option>
                                            <option>Quận Bình Thạnh</option>
                                            <option>Quận Tân Phú</option>
                                            <option>Quận Thủ Đức</option>
                                            <option>Quận Bình Tân</option>
                                            <option>Quận Hóc Môn</option>
                                            <option>Quận Bình Chánh</option>
                                            <option>Quận Nhà Bè</option>
                                            <option>Quận Củ Chi</option>
                                            <option>Quận Cần Giờ</option>

                                        </select>

                                        <div>
                                            @error('district')
                                                <div class="text-danger m-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="messager">
                            <h5>Giao nhận và thông điệp</h5>

                            <div>
                                <div class="row">
                                    <div class="col-5 m-1">
                                        <label>
                                            <span class="req">*</span>Chọn ngày giao hàng:
                                        </label>
                                    </div>
                                    <div class="col-6 date">
                                        <input type="date" name="shipped_at"
                                            @error('shipped_at') is-invalid @enderror>
                                        @error('shipped_at')
                                            <div class="text-danger m-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <Strong>Lời nhắn [Cho người nhận]</Strong>
                            <div class="col-12">
                                <textarea class="form-control" rows="2" name="message"></textarea>

                            </div>
                            <Strong>Lời nhắn [Cho shop]</Strong>
                            <div class="col-12">
                                <textarea class="form-control" rows="2" name="note"></textarea>

                            </div>

                        </div>

                        <div class="infor-pro">
                            <h5>Thông tin sản phẩm</h5>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>

                                    </tr>
                                </thead>
                                <tbody id="cart-items">

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-6">
                                    <strong id='total'></strong>
                                </div>

                            </div>

                        </div>
                        <div class="payment">
                            <h5>Phương thức thanh toán</h5>
                            <div class="form">
                                <div class="row m-2">
                                    <div class="col-3 m-1">
                                        <label>
                                            <span class="req">*</span>Chọn phương thức thanh toán:
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <select id="" name="paid_at">
                                            <option>Thanh toán khi nhận hàng</option>

                                            <option>Thanh toán qua ví điện tử</option>
                                        </select>
                                        @error('paid_at')
                                            <div class="text-danger m-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="confirm-pro">
                            <div class="row">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>

                                </div>

                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div>
            {{-- <form action="{{ url('/momo_payment') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-primary" name="payUrl">
                    Thanh toán MOMO
                </button>
            </form> --}}
            {{-- <form action="{{ url('/vnpay_payment') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" name="redirect">
                        Thanh toán VNPAY
                    </button>
                </form> --}}

        </div>

    </div>
    </div>
    <x-footer>

    </x-footer>

    <script src="{{ asset('assets/clients/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/849f1570d8.js" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
    <script>
        function calTototalCart(cart) {
            let total = 0;
            for (const key in cart) {
                const item = cart[key];

                total += item.price * item.quantity;
            }

            return total;
        }

        function renderCartItems(cart) {

            const tbody = document.getElementById('cart-items');
            tbody.innerHTML = '';
            for (const key in cart) {
                const item = cart[key];
                const tr = document.createElement('tr');
                tr.innerHTML = `

                <th scope="col">${item.name}</th>
                <th scope="col">${item.price}</th>
                <th scope="col">${item.quantity}</th>


                <th>

                </th>
                `;
                tbody.appendChild(tr);
            }
            const total = document.getElementById('total');
            total.innerHTML = `Tổng tiền: ${calTototalCart(cart)}`;
        }



        renderCartItems(@json(Session::get('cart', [])));
    </script>
    <script></script>
</body>

</html>
