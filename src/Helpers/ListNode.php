<?php

namespace Algorithms\Helpers;

class ListNode
{
    public function __construct(private int $value, private ?ListNode $next = null) {}

    public static function fromArray(array $list): self
    {
        return new ListNode(array_shift($list), $list ? self::fromArray($list) : null);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    public function getNext(): ?ListNode
    {
        return $this->next;
    }

    public function setNext(?ListNode $listNode): void
    {
        $this->next = $listNode;
    }

    public function toArray(): array
    {
        $result = [$this->getValue()];

        $next = $this->getNext();
        while (null !== $next) {
            $result[] = $next->getValue();
            $next = $next->getNext();
        }

        return $result;
    }
}
