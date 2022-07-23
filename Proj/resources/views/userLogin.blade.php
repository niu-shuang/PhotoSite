@extends('base/layout')
@section('title', 'ログイン')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ユーザーログイン</h2>
        <form method="POST" action="{{ route('checkUserLogin') }}">
            @csrf
            @foreach ($errors->all() as $error)
            <ul class="alert alert-danger">
                <li>{{$error}}</li>
            </ul>
            @endforeach


            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        </form>
        <div class="mt-5">
            <a class="btn btn-info" href="{{ route('userRegister') }}">
                ユーザー登録
            </a>
        </div>
    </div>
</div>
@endsection
