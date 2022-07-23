@extends('base/layout')
@section('title', '入札する')
@section('content')
<h2 class="product-align-center">商品入札</h2>
<form method="POST" action="{{ route('checkProductBid') }}">
    @csrf
    @foreach ($errors->all() as $error)
    <ul class="alert alert-danger">
        <li>{{$error}}</li>
    </ul>
    @endforeach


    <label for="bid_price" class="sr-only">入札金額</label>

    <input type="number" id="bid_price" name="bid_price" class="form-control" placeholder="{{$product->start_price + 1000 }}" required autofocus>
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button class="btn btn-lg btn-primary btn-block" type="submit">入札する</button>
</form>
@endsection
