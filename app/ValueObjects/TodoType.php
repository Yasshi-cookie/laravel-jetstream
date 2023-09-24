<?php

namespace App\ValueObjects;

use App\ValueObjects\Base\TypeValueObject;

class TodoType extends TypeValueObject
{
    public const TASK = 1;
    public const NOTE = 2;

    /**
     * @return array<int, string>
     */
    public function toArray(): array
    {
        return [
            self::TASK => 'タスク',
            self::NOTE => 'ノート',
        ];
    }
}
