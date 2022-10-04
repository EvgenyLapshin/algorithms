<?php

namespace Algorithms\Tasks;

use Algorithms\Helpers\ListNode;

/**
 * @link https://leetcode.com/problems/add-two-numbers/
 */
class AddTwoNumbers
{
    /**
     * Time complexity: O(n)
     *
     * @param ListNode|null $l1
     * @param ListNode|null $l2
     * @param int           $carry
     *
     * @return ListNode
     */
    public function recursion(?ListNode $l1, ?ListNode $l2, int $carry = 0): ListNode
    {
        $number = ($l1 ? $l1->getValue() : 0) + ($l2 ? $l2->getValue() : 0) + $carry;
        $carry = 0;
        if ($number > 9) {
            $carry = 1;
            $number %= 10;
        }

        $next = (null !== $l1?->getNext() || null !== $l2?->getNext() || $carry)
            ? $this->recursion($l1?->getNext(), $l2?->getNext(), $carry)
            : null;

        return new ListNode($number, $next);
    }

    /**
     * Time complexity: O(n)
     *
     * @param ListNode $l1
     * @param ListNode $l2
     *
     * @return ListNode
     */
    public function cycle(ListNode $l1, ListNode $l2): ListNode
    {
        $carry = 0;
        $dummyListNode = new ListNode(0, null);
        $currentListNode = $dummyListNode;

        while ($l1 || $l2 || $carry) {
            $sum = ($l1 ? $l1->getValue() : 0) + ($l2 ? $l2->getValue() : 0) + $carry;
            $carry = 0;
            if ($sum > 9) {
                $carry = 1;
                $sum %= 10;
            }

            $currentListNode->setNext(new ListNode($sum));
            $currentListNode = $currentListNode->getNext();

            $l1 = $l1?->getNext();
            $l2 = $l2?->getNext();
        }

        return $dummyListNode->getNext();
    }
}
