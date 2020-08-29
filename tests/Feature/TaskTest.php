<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Http\Requests\CreateTask;

class TaskTest extends TestCase
{
    //テストケース毎にデータベースをリフレッシュ
    use RefreshDatabase;

    /**
     * テストメソッドの実行前
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->seed('FoldersTableSeeder');
    }

    /**
  * 状態が定義された値ではない場合はバリデーションエラー
  * @test
  */
public function status_should_be_within_defined_numbers()
{
    $this->seed('TasksTableSeeder');

    $response = $this->post('/folders/1/tasks/1/edit', [
        'title' => 'Sample task',
        'due_date' => Carbon::today()->format('Y/m/d'),
        'status' => 999,
    ]);

    $response->assertSessionHasErrors([
        'status' => '状態 には 未着手、着手中、完了 のいずれかを指定してください。',
    ]);
}
}
