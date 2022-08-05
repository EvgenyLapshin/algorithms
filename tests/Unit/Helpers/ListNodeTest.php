<?php

namespace Tests\Unit\Tasks;

use Algorithms\Helpers\ListNode;
use Codeception\Test\Unit;
use UnitTester;

class ListNodeTest extends Unit
{
    protected UnitTester $tester;

    public function testToArray(): void
    {
        $actualResult = (new ListNode(2, new ListNode(4, new ListNode(3))))->toArray();
        $expectedResult = [2, 4, 3];

        $this->assertSame($expectedResult, $actualResult);
    }

    public function testFromArray(): void
    {
        $actualResult = ListNode::fromArray([2, 4, 3]);
        $expectedResult = new ListNode(2, new ListNode(4, new ListNode(3)));

        $this->assertEquals($expectedResult, $actualResult);
    }
}
