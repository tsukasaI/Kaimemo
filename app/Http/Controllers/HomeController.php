<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //ログインユーザーを取得
        $user = Auth::user();

        // ログインユーザーのフォルダ取得
        $folder = $user->folders()->first();

        //フォルダが無ければホームにレスポンス
        if(is_null($folder)) {
            return view('home');
        }

        //フォルダがあればタスク一覧にリダイレクト
        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }
}
