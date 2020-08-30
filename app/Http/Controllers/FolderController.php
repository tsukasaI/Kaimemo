<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        //フォルダモデルのインスタンスからタイトルをデータベースに書き込む
        $folder        = new Folder();
        $folder->title = $request->title;

        //usersに紐付ける
        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);

    }

        /**
     * フォルダ編集フォーム
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function showEditForm(Folder $folder)
    {
        return view('folders/edit', [
            'folder' => $folder,
        ]);
    }

    /**
     * フォルダ編集
     * @param Folder $folder
     * @param Task $task
     * @param EditTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Folder $folder, Request $request)
    {
        
        $folder->title = $request->title;
        $folder->save();

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }

    public function showDeleteForm(Folder $folder)
    {
        return view('folders/delete', [
            'folder' => $folder,
        ]);
    }

    public function delete(Folder $folder, Task $task)
    {
				$tasks = $task->all();
				$del_ids = [];
        foreach ($tasks as $k => $v) {
					if ($folder->id === $v->folder_id) {
						$del_ids[] = $v->id;
					}
        }
				foreach ($del_ids as $k => $v) {
					$task->find($v)->delete();
				}
				$folder->delete();
        return redirect('/');
    }
}
