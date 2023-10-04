<?php

namespace App\ValueObjects;

use App\ValueObjects\Base\TypeValueObject;

class TodoType extends TypeValueObject
{
    public const TASK = 1;
    public const NOTE = 2;

    /**
     * @param int $type
     */
    public function __construct(int $type = TodoType::TASK)
    {
        parent::__construct($type);
    }

    /**
     * @return array<int, string>
     */
    public static function toArray(): array
    {
        return [
            self::TASK => 'タスク',
            self::NOTE => 'ノート',
        ];
    }
}
