<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('home/header/header.css') }}">
    <link rel="stylesheet" href="{{ asset('home/body/body.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

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
    <div class="container" style="margin-top: 110px">
        <div class="row">
            <div class="col-3 overflow-hidden">
                <img class="img-thumbnail h-full w-full" src="{{ $product->feature_image_path }}" alt="Card image cap">
                <div id="rateYo" class="m-2"></div>
                <form action="{{ route('users.rating') }}" method="post">
                    @csrf
                    <input class="form-control" type="hidden" name="rating" id="rating">
                    <input class="form-control" type="hidden" name="product_id" id=""
                        value="{{ $product->id }}">
                    {{-- input user_id --}}
                    @if (Auth::check())
                        <input class="form-control" type="hidden" name="user_id" id=""
                            value="{{ Auth::user()->id }}">
                        <input class="form-control" type="hidden" name="name" id=""
                            value="{{ Auth::user()->name }}">
                    @endif
                    <input class="form-control" type="" name="content" id="" placeholder="Nhận xét">

                    <button type="submit" class="btn btn-primary m-2">Gửi đánh
                        giá</button>
                </form>
            </div>

            <div class="col-9">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->price }} Đồng</p>
                <p>{{ $product->content }}</p>

                <div class="offer">

                    <h4>Lưu ý</h4>
                    <p>Sản phẩm bạn đang chọn là sản phẩm được thiết kế đặc biệt!</p>
                    <p>Hiện nay, DesertFlower.com chỉ thử nghiệm cung cấp cho thị trường <strong>Tp. Hồ Chí Minh
                        </strong></p>

                </div>
                <div class="m-2">
                    <button class="btn btn-primary text-left" role="button"
                        onclick="addToCart(@json($product->id))">Thêm vào giỏ hàng</button>
                </div>
                <div class="offer">
                    <h4>Ưu đãi đặc biệt</h4>
                    <ul class="benefit">
                        <li>Giao miễn phí trong Thành phố Hồ Chí Minh</li>
                        <li>Giao gấp trong vòng 2 giờ</li>
                        <li>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li>
                        <li>Cam kết hoa tươi trên 3 ngày</li>
                    </ul>
                </div>
                <div>
                    <div class="col-md-12 rate">

                        <div class="col-md-12">
                            <div id="rateYo1" class=""></div>
                            <div class="star m-2">
                                <strong>Đánh giá : {{ $ratingAvg }}</strong>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-12 comment">
                        <div class="star">
                            <strong>Nhận xét : </strong>
                        </div>

                        @foreach ($ratings as $rating_item)
                            <div class="col-md-12 m-2">
                                <div class="col-md-12">
                                    <strong>{{ $rating_item->user->name }}</strong>
                                </div>
                                <div id="rateYo2" class="">
                                    <input class="form-control" type="hidden" name="rate"
                                        value="{{ $rating_item->rating }}">
                                </div>
                                <div class="col-md-12">
                                    <p>{{ $rating_item->content }}</p>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>
            <div class="wrapper-body">
                <h5><span title="Mẫu hoa tuơng tự" class="m-2">
                        MẪU HOA TƯƠNG TỰ
                    </span>
                </h5>
                <div class="container">

                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                @foreach ($productsInCategory as $product)
                                    <div class="item col-md-2 relative justify-center">
                                        <div class="card image_category" style="text-align: center">
                                            <a href="{{ route('product', [$product]) }}">
                                                <figure>
                                                    <img class="" src="../images/13262_tinh-dau-tho-ngay.jpg"
                                                        alt="Card image cap">
                                                </figure>
                                            </a>

                                            <div class="card-body">
                                                <a href="{{ route('product', [$product]) }}"
                                                    class="card-text">{{ $product->name }}</a>
                                                <div>
                                                    <span>{{ $product->price }} đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center m-2">
                            {{ $productsInCategory->links('pagination::simple-bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
            <x-footer>

            </x-footer>
            @yield('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
                integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
            <script src="https://kit.fontawesome.com/849f1570d8.js" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"></script>
            <script>
                $(function() {
                    let rate = '{{ $ratingAvg }}';
                    $("#rateYo").rateYo({


                        rating: rate,
                        rating: 0,

                        normarlizedFill: '#FF0000',

                        starWidth: "20px",

                    }).on("rateyo.set", function(e, data) {
                        var rating = data.rating;
                        $("#rating").val(rating);

                    });
                });
            </script>
            <script>
                $(function() {
                    let rate = '{{ $ratingAvg }}';
                    $("#rateYo1").rateYo({
                        rating: rate,


                        normarlizedFill: '#FF0000',

                        starWidth: "20px",
                    });
                });
            </script>
            <script>
                $(function() {
                    let rate_item = $("#rateYo2 input").val();
                    $("#rateYo2").rateYo({
                        rating: rate_item,


                        normarlizedFill: '#FF0000',

                        starWidth: "20px",
                    });
                });
            </script>
            <script>
                async function addToCart(id) {
                    const {
                        data
                    } = await axios.post(@json(route('cart.add')), {
                        id: id,
                    });

                    renderCount(data);

                    await Swal.fire({
                        title: 'Thêm vào giỏ hàng thành công',
                        icon: 'success',
                    });
                }
            </script>

</body>

</html>
