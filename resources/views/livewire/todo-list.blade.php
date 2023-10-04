<div class="mb-6 mx-6">
    <div class="my-2 flex gap-2">
        <input type="text" wire:model.live="title" placeholder="Todo..." />
        <button class="success-btn" wire:click="add">Add Todo</button>
        <button class="secondary-btn" x-on:click="$wire.title = ''">Clear</button>
    </div>

    <div class="my-2 flex gap-1">
        <p>Todo character length:</p>
        <p
            :class="$wire.title.length < 16 ? '' : 'text-red-500'"
            x-text="$wire.title.length < 16 ? $wire.title.length : '16文字以内で入力してください。'"
        ></p>
    </div>

    <h3 class="text-2xl font-bold tracking-tight text-gray-900">List</h3>
    <ul class="flex flex-col gap-2">
        @foreach ($todoList as $todo)
            <li class="flex flex-row gap-4">
                <div
                    class="text-s w-full items-center rounded-md bg-gray-300 px-2 py-1 font-medium text-black ring-1 ring-inset ring-gray-500/10"
                >
                    {{ $todo->title }}
                </div>
                <button class="danger-btn">Delete</button>
            </li>
        @endforeach
    </ul>
</div>
