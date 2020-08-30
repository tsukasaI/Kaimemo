@extends('layout')

@section('content')

<!-- header -->
<div class="jumbotron h-100 pt-0" style="background: url({{ asset('image/top.jpeg') }}); background-size:cover;">
  <div class="container" style="padding-top: 2rem;">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <nav class="panel panel-default">
              <div class="panel-heading">ログイン</div>
              <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                  @endforeach
                </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                  </div>
                  <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password" />
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">ログイン</button>
                  </div>
                </form>
                <div class="text-center">
                  <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- body -->
<h1 class="text-center p-4">買い物メモをより便利に。買い物メモに特化したアプリです</h1>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <h2 class="text-center">こんな経験ありませんか？</h2>
      <br>
      <h5>せっかく書いたのに家にメモを忘れてきた...</h5>
      <h5>作業中に買いたいものが思いついたのにメモする時に思い出せない...</h5>

    </div>
    <div class="col-md-6">
      <img src="{{ asset('image/forgot.jpg') }}" alt="メモを忘れて困った" class="img-responsive center-block w-100">
    </div>
  </div>
</div>

<div class="container mt-4">
  <h2 class="text-center">買いメモのこんな機能で解決しましょう</h2>
  <div class="row">
    <div class="col-md-6">
      <img src="{{ asset('image/folder.jpg') }}" alt="フォルダ" class="img-responsive center-block w-100">
      <h2 class="mt-2 text-center">フォルダで整理</h2>
      <h5>食料品、日用品などをフォルダで分けて管理</h5>
    </div>
    <div class="col-md-6">
      <img src="{{ asset('image/memo.jpg') }}" alt="メモ" class="img-responsive center-block w-100">
      <h2 class="mt-2 text-center">必要な度合いも記録できる</h2>
      <h5>必要なものと安い時に欲しいものをラベル付け</h5>
    </div>
  </div>
</div>

<div class="container mt-4">
  <h1 class="text-center">さぁ買い物メモをより便利にしましょう</h1>
  <div class="row">
    <div class="col-md-6">
      <img src="{{ asset('image/enjoy.jpg') }}" alt="笑顔" class="img-responsive center-block w-100">
      <br>
    </div>
    <div class="col-md-6">
      <p>
        登録はこちらから
        <a class="btn btn-primary" href="{{ route('register') }}" role="button btn btn-primary btn-lg btn-block">今すぐ登録する</a>
      </p>
      <p>
        アカウントをお持ちですか？
        <a href="#email">ログインへ</a>
      </p>
    </div>
  </div>
</div>

<!-- fotter -->
<p class="text-center pt-4">Copyright &copy; 2020. All rights reserved.</p>

@endsection