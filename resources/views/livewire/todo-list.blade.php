<div>
    <input type="text" wire:model="title" placeholder="Todo...">

    <button class="success-btn" wire:click="add">Add Todo</button>

    <ul>
        @foreach ($todoList as $todo)
            <li>{{ $todo->title }}</li>
        @endforeach
    </ul>
</div>
