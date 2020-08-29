@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading">メモを編集する</div>
                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">メモ</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $task->title }}" />
                        </div>
                        <div class="form-group">
                            <label for="status">必要度</label>
                            <select name="status" id="status" class="form-control">
                                @foreach(\App\Task::STATUS as $key => $val)
                                <option value="{{ $key }}" {{ $key == old('status', $task->status) ? 'selected' : '' }}>
                                    {{ $val['label'] }}
                                </option>
                                @endforeach
                            </select>
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