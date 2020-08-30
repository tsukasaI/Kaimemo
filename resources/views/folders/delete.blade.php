@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダを削除する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form
              action="{{ route('folders.delete', ['folder' => $folder->id]) }}"
              method="POST"
            >
              @csrf
              <div class="form-group">
                <label for="title">フォルダ「{{ $folder->title }}」を削除しても良いですか？</label>
                <label for="title">*フォルダ内のメモも削除されます。</label>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">削除</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection