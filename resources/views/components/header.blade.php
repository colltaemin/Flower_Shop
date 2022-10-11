@section('css')
    <link rel="stylesheet" href="home/header/header.css">
@endsection
<header>
    <div class="container-fluid relative">
        <div class="col-md-12">
            <div class="row">
                <ul class="nav justify-content-center p-3">
                    <li class="nav-item">
                        <a href="/" title="Shop hoa yêu thương"><img src="../images/logo-hoa-yeu-thuong.png"></a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="/">Trang chủ</a>
                    </li>

                    <li class="nav-item dropdown p-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Danh mục
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Hoa Sinh Nhật</a></li>
                            <li><a class="dropdown-item" href="#">Hoa Khai Trương</a></li>
                            <li><a class="dropdown-item" href="#">Hoa Chúc Mừng</a></li>
                            <li><a class="dropdown-item" href="#">Hoa Chia Buồn</a></li>
                            <li><a class="dropdown-item" href="#">Hoa Tình Yêu</a></li>
                            <li><a class="dropdown-item" href="#">Hoa Mừng Tốt Nghiệp</a></li>
                        </ul>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>

                    <li class="nav-item p-2">
                        <form action="" class="d-flex" role="form">
                            <input class="form-control me-4 search_ajax" type="search" name="key"
                                placeholder="Search" aria-label="Search">

                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <div>
                                <ul class="list-group search_ajax_result" style="position: absolute; z-index: 9999;">

                                </ul>
                            </div>
                        </form>
                    </li>

                    <li class="nav-item p-1">
                        <div><a href="{{ route('carts') }}"class="nav-link" id="bag">
                                <img src="../images/shopping-bag.png" alt="">
                                <span id="count"></span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">

                        @if (Auth::check())
                            <div class="dropdown m-2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                        <a href="{{ route('orderDetail') }}">Đơn hàng của tôi</a>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">

                                    <button class="btn btn-outline-success" type="submit">Đăng nhập</button>
                                </a>
                        @endif

                    </li>
                </ul>

            </div>

        </div>
    </div>
</header>

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const bag = document.getElementById('bag');
        bag.addEventListener('click', function(e) {
            const count = document.getElementById('count');
            if (!count.innerHTML) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Giỏ hàng trống!',
                })
                return false;
            }
        })

        function renderCount(cart) {
            const count = document.getElementById('count');
            let quantity = 0;
            for (const key in cart) {
                quantity += 1;
            }
            if (quantity > 0) {
                count.innerHTML = quantity;
            } else {
                count.innerHTML = '';
            }

        }

        renderCount(@json(Session::get('cart', [])));
    </script>
    <script></script>
@endsection
