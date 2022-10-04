<?php

namespace Tests\Unit\Tasks;

use Algorithms\Tasks\TwoSum;
use Codeception\Test\Unit;
use UnitTester;

class TwoSumTest extends Unit
{
    protected UnitTester $tester;

    public function sequenceDataProvider(): array
    {
        return [
            ['sequence' => [2, 7, 11, 15], 'target' => 9, 'result' => [0, 1]],
            ['sequence' => [3, 2, 4], 'target' => 6, 'result' => [1, 2]],
            ['sequence' => [3, 3], 'target' => 6, 'result' => [0, 1]],
            ['sequence' => [1, 6023, 10851, 12694], 'target' => 18717, 'result' => [1, 3]],
        ];
    }

    /**
     * @dataProvider sequenceDataProvider
     */
    public function testBruteForceSearch(array $sequence, int $target, array $result): void
    {
        $task = new TwoSum();
        $actualResult = $task->bruteForceSearch($sequence, $target);

        $this->assertSame($result, $actualResult, 'Sequence: ' . implode(',', $sequence));
    }

    /**
     * @dataProvider sequenceDataProvider
     */
    public function testHashmap(array $sequence, int $target, array $result): void
    {
        $task = new TwoSum();
        $actualResult = $task->hashmap($sequence, $target);

        $this->assertSame($result, $actualResult, 'Sequence: ' . implode(',', $sequence));
    }
}
