@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading">フォルダ名を編集する</div>
                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('folders.edit', ['folder' => $folder->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">フォルダ名</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $folder->title }}" />
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">変更</button>
                        </div>
                        <div>
                            <a href="/"><メモ一覧に戻る</a>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection