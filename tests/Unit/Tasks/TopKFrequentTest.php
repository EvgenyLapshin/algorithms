<?php

namespace Tests\Unit\Tasks;

use Algorithms\Tasks\TopKFrequent;
use Codeception\Test\Unit;
use UnitTester;

class TopKFrequentTest extends Unit
{
    protected UnitTester $tester;

    public function priorityQueueDataProvider(): array
    {
        return [
            ['nums' => [1, 1, 1, 2, 2, 3], 'k' => 2, 'result' => [1, 2]],
            ['nums' => [1, 2, 1, 3, 2, 3], 'k' => 2, 'result' => [1, 3]],
        ];
    }

    /**
     * @dataProvider priorityQueueDataProvider
     */
    public function testPriorityQueue(array $nums, int $k, array $result): void
    {
        $actualResult = (new TopKFrequent())->priorityQueue($nums, $k);

        $errorMessage = "\nnums: " . implode(',', $nums)
            . "\nk: " . $k
            . "\nExpected result: " . implode(',', $result)
            . "\nActual   result: " . implode(',', $actualResult)
            . "\n";

        $this->assertSame($result, $actualResult, $errorMessage);
    }

    public function nativeFunctionsDataProvider(): array
    {
        return [
            ['nums' => [1, 1, 1, 2, 2, 3], 'k' => 2, 'result' => [1, 2]],
            ['nums' => [1, 2, 1, 3, 2, 3], 'k' => 2, 'result' => [1, 2]],
        ];
    }

    /**
     * @dataProvider nativeFunctionsDataProvider
     */
    public function testNativeFunctions(array $nums, int $k, array $result): void
    {
        $actualResult = (new TopKFrequent())->nativeFunctions($nums, $k);

        $errorMessage = "\nnums: " . implode(',', $nums)
            . "\nk: " . $k
            . "\nExpected result: " . implode(',', $result)
            . "\nActual   result: " . implode(',', $actualResult)
            . "\n";

        $this->assertSame($result, $actualResult, $errorMessage);
    }
}
