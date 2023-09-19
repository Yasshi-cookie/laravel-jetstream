<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo list')]
class TodoList extends Component
{
    public array $todoList = [];

    public string $todo = '';

    public function add()
    {
        $this->todoList[] = $this->todo;

        $this->todo = '';
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
