@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading">メモを追加する</div>
                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ route('tasks.create', ['folder' => $folder_id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">メモ</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="status">欲しい度</label>
                            <select name="status" id="status" class="form-control">
                                @foreach(\App\Task::STATUS as $key => $val)
                                <option value="{{ $key }}" {{ $key == 1 ? 'selected' : '' }}>
                                    {{ $val['label'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">追加</button>
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