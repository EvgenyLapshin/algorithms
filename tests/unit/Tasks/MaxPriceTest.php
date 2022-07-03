<?php

namespace unit\Tasks;

use Algorithms\Tasks\MaxPrice;
use Codeception\Test\Unit;
use UnitTester;

class MaxPriceTest extends Unit
{
    protected UnitTester $tester;

    public function sequenceDataProvider(): array
    {
        return [
            'true' => ['sequence' => [1, 3, 1, 2], 'maxSum' => 10],
            'empty' => ['sequence' => [], 'maxSum' => 0],
        ];
    }

    /**
     * @dataProvider sequenceDataProvider
     */
    public function testFromLeft(array $sequence, int $maxSum): void
    {
        $task = new MaxPrice();
        $actualResult = $task->fromLeft($sequence);

        $this->assertSame($maxSum, $actualResult);
    }

    /**
     * @dataProvider sequenceDataProvider
     */
    public function testFromRight(array $sequence, int $maxSum): void
    {
        $task = new MaxPrice();
        $actualResult = $task->fromRight($sequence);

        $this->assertSame($maxSum, $actualResult);
    }
}
