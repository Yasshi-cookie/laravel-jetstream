<?php

namespace App\Livewire;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo list')]
class TodoList extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Livewire supports the following primitive property types:
    |--------------------------------------------------------------------------
    |
    | Array, String, Integer, Float, Boolean, and Null
    |
    */
    #[Rule('required|min:1|max:64')]
    public string $title = '';
    public int $maxTodos = 10;
    public bool $showTodos = false;
    public int $todoFilter = 10;

    /*
    |--------------------------------------------------------------------------
    | Supported PHP types:
    |--------------------------------------------------------------------------
    |
    | Type                Full Class Name
    |
    | Collection          Illuminate\Support\Collection
    | Eloquent Collection Illuminate\Database\Eloquent\Collection
    | Model               Illuminate\Database\Model
    | DateTime            DateTime
    | Carbon              Carbon\Carbon
    | Stringable          Illuminate\Support\Stringable
    |
    */
    public Collection $todoList;
    public Todo $todo;
    public Carbon $last_posted_date;

    public function mount(): void
    {
        $this->todoList = Auth::user()->todos;
    }

    public function add()
    {
        $this->validate();

        Todo::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
        ]);

        // todoプロパティをリセット
        // mountメソッドが呼び出される前の状態に戻す。※mountメソッドの中では使えない。
        $this->reset('todo');
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
