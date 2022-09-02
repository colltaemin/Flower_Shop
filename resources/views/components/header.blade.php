<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <ul class="nav justify-content-center bg-info p-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link fixed right-0">
                        <i class="fa fa-shopping-bag fa-1x m-1" aria-hidden="true"></i>Giỏ hàng
                        <i class="fa fa-user-circle-o fa-1x m-1" aria-hidden="true"></i>Đăng nhập

                    </a>
                </li>

                <li>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
            </ul>

        </div>

    </div>
</div>
