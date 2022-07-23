@extends('base/layout')
@section('title', '商品登録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品登録</h2>
        <form method="POST" action="{{ route('registerProduct') }}" enctype="multipart/form-data">
            @csrf
            @foreach ($errors->all() as $error)
            <ul class="alert alert-danger">
                <li>{{$error}}</li>
            </ul>
            @endforeach

            <label for="product_name" class="sr-only">写真名</label>
            <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product Name" required autofocus>
            <label for="start_price" class="sr-only">初期価格</label>
            <input type="number" id="start_price" name="start_price" class="form-control" required autofocus>
            <label for="buyout_price" class="sr-only">即決価格</label>
            <input type="number" id="buyout_price" name="buyout_price" class="form-control" required>
            <label for="author_name" class="sr-only">写真家名</label>
            <input type="text" id="author_name" name="author_name" class="form-control" placeholder="Author name" required>
            <label for="create_year" class="sr-only">撮影年</label>
            <input type="text" id="create_year" name="create_year" class="form-control" placeholder="create year" required>
            <label for="photographic_paper_type" class="sr-only">印画紙の種類</label>
            <input type="text" id="photographic_paper_type" name="photographic_paper_type" class="form-control" placeholder="シルバー・ゼラチン・プリント" required>
            <label for="size" class="sr-only">サイズ</label>
            <input type="text" id="size" name="size" class="form-control" placeholder="size" required>
            <label for="place" class="sr-only">撮影場所</label>
            <input type="text" id="place" name="place" class="form-control" placeholder="撮影場所" required>
            <label for="thumbnail" class="sr-only">サブネイル</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*"/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">登録</button>
        </form>
    </div>
</div>
@endsection
