<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giỏ hàng</title>
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
        /* html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 60px;

        } */
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            line-height: 60px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <x-header>

    </x-header>
    <div class="content-wrapper" style="margin-top: 110px">
        <div class="content">
            <div class="container-fluid">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Hành động</th>

                                    </tr>
                                </thead>

                                <tbody id="cart-items">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <div class="m-3">
                                <strong id='total'></strong>
                            </div>
                            <div class="m-3">
                                <a href="{{ route('order') }}" class="btn btn-primary" role="button" id="oder">Đặt
                                    hàng</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 d-flex justify-content-center">
                        {{-- {{ $roles->links('pagination::bootstrap-4') }} --}}
                    </div>

                </div>
            </div>
        </div>
        <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/849f1570d8.js" crossorigin="anonymous"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('js')
        <script>
            const oder = document.getElementById('oder');
            oder.onclick = function() {
                const cartItems = document.getElementById('cart-items');
                if (cartItems.innerHTML == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Giỏ hàng trống!',
                    })
                    return false;
                }

            }

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
                <th scope="col">${item.id}</th>
                <th scope="col">${item.name}</th>
                <th scope="col">${item.price}</th>
                <th>
                    <button onclick="decreaseQuantity(${item.id})">-</button>
                    <span class="m-2">${item.quantity}</span>
                    <button onclick="increaseQuantity(${item.id})">+</button>
                </th>
                <th>
                <button class="btn btn-danger" role="button" onclick="removeCart(${item.id})">Xóa khỏi giỏ hàng</button>
                </th>
                `;
                    tbody.appendChild(tr);
                }

                const total = document.getElementById('total');
                total.innerHTML = `Tổng tiền: ${calTototalCart(cart)}`;
                renderCount(cart);
            }

            async function removeCart(id) {
                const {
                    isConfirmed
                } = await Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa không?',
                    text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa nó!'
                })


                if (!isConfirmed) {
                    return;
                }

                const {
                    data
                } = await axios.post(@json(route('cart.delete')), {
                    '_method': 'DELETE',
                    id,
                });


                Swal.fire({
                    title: 'Xóa thành công',
                    icon: 'success',
                });

                renderCartItems(data);
            }


            async function decreaseQuantity(id) {
                const {
                    data
                } = await axios.post(@json(route('cart.decrease')), {
                    '_method': 'PATCH',
                    id,
                });
                renderCartItems(data);
            }

            async function increaseQuantity(id) {
                const {
                    data
                } = await axios.post(@json(route('cart.increase')), {
                    '_method': 'PATCH',
                    id,
                });

                renderCartItems(data);
            }

            renderCartItems(@json(Session::get('cart', [])));
        </script>

        <x-footer class="footer bg-light mt-auto py-3">

        </x-footer>
</body>

</html>
