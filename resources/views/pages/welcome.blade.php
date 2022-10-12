<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('home/header/header.css') }}">
    <link rel="stylesheet" href="{{ asset('home/body/body.css') }}">
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
    <div class="container">
        <div class="slider_show">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/P62ff2f312a2af5.69604601_banner-4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/P633e9f013c2859.82701453_1355x432 copy.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/P62ff2f4e0abb80.16911720_banner-5.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>

    <div class="wrapper-home">

        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="content">
                        {{-- <h2><span title="Mẫu hoa mới năm 2022">
                            MẪU HOA MỚI NĂM 2022
                        </span>
                        </h2> --}}

                        <div class="row category_item p-2">

                            @foreach ($categories as $category)
                                <div class="col-md-2 image_category justify-center">
                                    <a href="{{ route('category', ['id' => $category->id]) }}">
                                        <figure><img src="{{ $category->featured_image }}"></figure>
                                    </a>
                                    <a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="wrapper-body">
        <h2><span title="Mẫu hoa mới năm 2022">
                MẪU HOA MỚI NĂM 2022
            </span>
        </h2>
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="item col-md-2 relative justify-center">
                                <div class="card image_category" style="text-align: center ">
                                    <a href="{{ route('product', [$product]) }}">
                                        <figure>
                                            <img src="images/13262_tinh-dau-tho-ngay.jpg" alt="Card image cap">
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
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>

    <div class="wrapper-body">
        <h2><span title="Mẫu hoa mới năm 2022">
                ĐƯỢC ĐÁNH GIÁ TỐT NHẤT 2022
            </span>
        </h2>
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        @foreach ($product_rate as $product)
                            <div class="item col-md-2 relative justify-center">
                                <div class="card image_category" style="text-align: center ">
                                    <a href="{{ route('product', [$product]) }}">
                                        <figure>
                                            <img src="images/13262_tinh-dau-tho-ngay.jpg" alt="Card image cap">
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
    <script>
        var myCarousel = document.querySelector('#carouselExampleIndicators')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: false
            carousel.to(0)
        })
        //quay lại slide đầu tiên
    </script>
    @yield('js')

</body>

</html>
