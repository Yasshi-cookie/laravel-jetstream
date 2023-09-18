<div>
    <form wire:submit.prevent="createPost">
        <div class="flex flex-col gap-2">
            <div class="flex flex-row gap-2">
                <label>Title</label>
                <input name="title" type="text" wire:model.blur="title" />
            </div>

            <p>Current title {{ $title }}</p>
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-4">
            <button
                type="button"
                class="main-btn"
                wire:click='addTag' >
                    タグを追加
            </button>
        </div>

        <div>
            @foreach ($tags as $index => $tag)
                <div class="flex flex-col gap-2">
                    <div class="mb-4">
                        <label>タグ {{ $index + 1 }}</label>
                    </div>
                    <div class="flex gap-2">
                        <input type="text" wire:model.blur="tags.{{ $index }}">
                        <button
                            type="button"
                            class="danger-btn"
                            wire:click="removeTag({{ $index }})" >
                                削除
                        </button>
                        {{ $tag }}
                    </div>
                    @error("tags.{ $index }")
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>

        <button type="submit" class="main-btn">投稿を作成</button>
    </form>
</div>
