<div>
    <input type="text" wire:model="todo" placeholder="Todo...">

    <button class="success-btn" wire:click="add">Add Todo</button>

    <ul>
        @foreach ($todoList as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>
</div>
