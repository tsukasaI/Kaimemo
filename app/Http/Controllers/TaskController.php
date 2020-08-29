<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\Task;
use App\Http\Requests\EditTask;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * タスク一覧
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function index(Folder $folder)
    {
        //ユーザーからフォルダを取得
        $folders = Auth::user()->folders()->get();

        //選択したフォルダを取得
        $tasks = $folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $folder->id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * タスク作成フォーム
     * @param Folder $folder
     * @return \Illuminate\View\View
     */

    public function showCreateForm(Folder $folder)
    {
        return view('tasks/create', [
            'folder_id' => $folder->id,
        ]);
    }

    /**
     * タスク作成
     * @param Folder $folder
     * @param CreateTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Folder $folder, CreateTask $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->status = $request->status;

        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }

    /**
     * タスク編集フォーム
     * @param Folder $folder
     * @param Task $task
     * @return \Illuminate\View\View
     */
    public function showEditForm(Folder $folder, Task $task)
    {
        $this->checkRelation($folder, $task);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    /**
     * タスク編集
     * @param Folder $folder
     * @param Task $task
     * @param EditTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Folder $folder, Task $task, EditTask $request)
    {
        $this->checkRelation($folder, $task);
        
        $task->title = $request->title;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index', [
            'folder' => $task->folder_id,
        ]);
    }

    public function checkRelation(Folder $folder, Task $task)
    {
        if($folder->id !== $task->folder_id) {
            abort(404);
        }
    }

    public function showDeleteForm(Folder $folder, Task $task)
    {
        $this->checkRelation($folder, $task);

        return view('tasks/delete', [
            'task' => $task,
        ]);
    }

    public function delete(Folder $folder, Task $task, EditTask $request)
    {
        $this->checkRelation($folder, $task);
        
        $task->id = $request->id;
        $task->delete();

        return redirect()->route('tasks.index', [
            'folder' => $task->folder_id,
        ]);
    }
    
}
