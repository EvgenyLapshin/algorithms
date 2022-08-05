<?php

namespace Tests\Unit\Tasks;

use Algorithms\Helpers\ListNode;
use Algorithms\Tasks\AddTwoNumbers;
use Codeception\Test\Unit;
use UnitTester;

class AddTwoNumbersTest extends Unit
{
    protected UnitTester $tester;

    public function sequenceDataProvider(): array
    {
        return [
            ['l1' => [2, 4, 3], 'l2' => [5, 6, 4], 'result' => [7, 0, 8]],
            ['l1' => [0], 'l2' => [0], 'result' => [0]],
            ['l1' => [9, 9, 9, 9, 9, 9, 9], 'l2' => [9, 9, 9, 9], 'result' => [8, 9, 9, 9, 0, 0, 0, 1]],
        ];
    }

    /**
     * @dataProvider sequenceDataProvider
     */
    public function testSum(array $l1, array $l2, array $result): void
    {
        $task = new AddTwoNumbers();
        $actualResult = $task->recursion(ListNode::fromArray($l1), ListNode::fromArray($l2));

        $errorMessage = "\nl1: " . implode(',', $l1)
            . "\nl2: " . implode(',', $l2)
            . "\nExpected result: " . implode(',', $result)
            . "\nActual   result: " . implode(',', $actualResult->toArray())
            . "\n";

        $this->assertSame($result, $actualResult->toArray(), $errorMessage);
    }

    /**
     * @dataProvider sequenceDataProvider
     */
    public function testCycle(array $l1, array $l2, array $result): void
    {
        $task = new AddTwoNumbers();
        $actualResult = $task->cycle(ListNode::fromArray($l1), ListNode::fromArray($l2));

        $errorMessage = "\nl1: " . implode(',', $l1)
            . "\nl2: " . implode(',', $l2)
            . "\nExpected result: " . implode(',', $result)
            . "\nActual   result: " . implode(',', $actualResult->toArray())
            . "\n";

        $this->assertSame($result, $actualResult->toArray(), $errorMessage);
    }
}
