@section('css')
    <link rel="stylesheet" href="home/header/header.css">
@endsection
<header>
    <div class="container-fluid relative">
        <div class="col-md-12">
            <div class="row">
                <ul class="nav justify-content-center p-3">
                    <li class="nav-item">
                        <a href="/" title="Shop hoa yêu thương"><img src="images/logo-hoa-yeu-thuong.png"></a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#">Trang chủ</a>
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
                        <form class="d-flex" role="search">
                            <input class="form-control me-4" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>

                    <li class="nav-item p-1">
                        <a href="{{ route('cart') }}" class="nav-link">
                            <img src="images/shopping-bag.png" alt="">

                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">

                            <button class="btn btn-outline-success" type="submit">Đăng nhập</button>
                        </a>

                    </li>
                </ul>

            </div>

        </div>
    </div>
</header>

@section('js')
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown()
        });
    </script>
@endsection
