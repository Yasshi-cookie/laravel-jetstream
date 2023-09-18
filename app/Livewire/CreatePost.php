<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Livewire;

class CreatePost extends Component
{
    public string $title = '';

    public array $tags = [];

    // バリデーションルール
    protected $rules = [
        'title' => [
            'required',
            'between:3,255',
        ],
        'tags' => [
            'required',
            'array',
        ],
        'tags.*' => [
            'required',
            'min:3',
        ],
    ];

    // バリデーションメッセージ
    protected $messages = [
        'title.required' => ':attributeは必須です。',
        'title.between' => ':attributeは3文字以上255文字以内で入力してください。',
        'tags.required' => ':attributeは必須です。',
        'tags.*' => ':attributeは3文字以上で入力してください。',
    ];

    public function updated($attributeName)
    {
        $this->validateOnly($attributeName);
    }

    public function render()
    {
        return view('livewire.create-post');
    }

    public function addTag(): void
    {
        $this->tags[] = '';
    }

    public function removeTag(int $index): void
    {
        unset($this->tags[$index]);
        // キーを振り直す
        $this->tags = array_values($this->tags);
    }


    public function createPost(): void
    {
        $this->validate();

        $this->reset([
            'title',
            'tags',
        ]);
    }
}
