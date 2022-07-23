<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type='text/javascript' src='/js/jquery.min.js'></script>
    <script type="text/javascript" src="/js/photo.js"></script>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/custom.css">
    <script src="/js/app.js" defer></script>

    <style type="text/css">
        <!--
        ul#gallery {
            width: 100%;
            height: auto;
        }

        ul#gallery li {
            width: 100px;
            padding: 8px 8px 0px 0px;
            height: auto;
            float: left;
        }

        ul#gallery li.end {
            width: 100px;
            padding: 8px 0px 0px 0px;
            height: auto;
        }

        ul#gallery li img {
            width: 100px;
            height: 67px;
        }
        -->
    </style>

    <script type="text/javascript">
        $(function() {
            $('#imgMain a').lightBox();
        });
    </script>
</head>
<header class="header bg-dark  fixed-top">
    @include('base/header')
</header>
<br>

<div class="container content">
    <div class="row">
        <div class="">
            <h2>{{$product->product_name}}</h2>
                <div id="imgMain"><img src="/trunk/img/{{$product->thumbnail}}" alt="" name="target" id="target" /></div>
                    <ul id="gallery" class="clearfix">
                        <li><a href="/trunk/img/{{$product->thumbnail}}"><img src="/trunk/img/{{$product->thumbnail}}" alt="" /></a></li>
                        <li class="end"><a href="/trunk/img/{{$product->thumbnail}}"><img src="/trunk/img/{{$product->thumbnail}}" alt="" /></a></li>
                    </ul>
        </div>
        <div class="product-info">
            <p>現在価額 : {{ number_format($product->start_price)}}</p>
            <p>即決価格 : {{ number_format($product->buyout_price)}}</p>
        </div>
        <div class="product-align-center">
            <form method="GET" action="{{ route('showProductBid') }}">
                <input type="hidden" name="id" value="{{$product->id}}">
                <button class="btn btn-lg btn-primary btn-block" type="submit">入札する</button>
            </form>
        </div>
        <div class="product-info">
            <p>写真家名 : {{ $product->author_name}}</p>
            <p>撮影年 : {{ $product->create_year}}</p>
            <p>撮影場所 : {{ $product->place}}</p>
            <p>サイズ : {{ $product->size}}</p>
            <p>印画紙の種類 : {{ $product->photographic_paper_type }}</p>
        </div>
    </div>
</div>
<footer class="footer bg-dark  fixed-bottom">
    @include('base/footer')
</footer>
</body>
</html>
