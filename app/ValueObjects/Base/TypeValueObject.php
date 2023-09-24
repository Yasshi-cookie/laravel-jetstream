<?php

namespace App\ValueObjects\Base;

use InvalidArgumentException;
use Livewire\Wireable;

abstract class TypeValueObject implements Wireable
{
    protected readonly int $type;
    protected readonly string $name;

    /**
     * @param integer $type
     */
    public function __construct(int $type)
    {
        if (! $this->isValid($type)) {
            throw new InvalidArgumentException("指定されたtype={$type}が不正です。");
        }

        $this->type = $type;
        $this->name = $this->getName();
    }

    /**
     * @return integer
     */
    public function getValue(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->toArray()[$this->type];
    }

    /**
     * @param integer $type
     * @return boolean
     */
    protected function isValid(int $type): bool
    {
        return in_array(
            $type,
            array_keys($this->toArray())
        );
    }

    /*
    |--------------------------------------------------------------------------
    | abstract
    |--------------------------------------------------------------------------
    */

    /**
     * @return array<int, string>
     */
    abstract public function toArray(): array;

    /*
    |--------------------------------------------------------------------------
    | Implements For WireableInterface
    |--------------------------------------------------------------------------
    */
    public function toLivewire()
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
        ];
    }

    public static function fromLivewire($data)
    {
        return new static($data['type']);
    }
}
