@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-4">
            <nav class="panel panel-default">
                <div class="panel-heading">フォルダ</div>
                <div class="panel-body">
                    <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
                        フォルダを追加する
                    </a>
                </div>
                <div class="list-group">
                    @foreach($folders as $folder)
                    <div class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}" style="display: flex; justify-content: space-between">
                        <a href="{{ route('tasks.index', ['folder' => $folder->id]) }}">
                            {{ $folder->title }}
                        </a>
                        <span>
                            <a href="{{ route('folders.edit', ['folder' => $folder->id]) }}">編集</a>
                            <a href="{{ route('folders.delete', ['folder' => $folder->id]) }}">削除</a>
                        </span>
                    </div>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="column col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">メモ</div>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="{{ route('tasks.create', ['folder' => $current_folder_id]) }}" class="btn btn-default btn-block">
                            メモを追加する
                        </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>買うもの</th>
                            <th>必要度</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>
                                <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                            </td>
                            <td><a href="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}">編集</a></td>
                            <td><a href="{{ route('tasks.delete', ['folder' => $task->folder_id, 'task' => $task->id]) }}">削除</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection