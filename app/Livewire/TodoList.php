<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo list')]
class TodoList extends Component
{
    public Collection $todoList;

    public string $todo;

    public function mount(): void
    {
        $this->todoList = collect();
        $this->todo = '';
    }

    public function add()
    {
        $this->todoList->push($this->todo);

        // todoプロパティをリセット
        // mountメソッドが呼び出される前の状態に戻す。※mountメソッドの中では使えない。
        $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
