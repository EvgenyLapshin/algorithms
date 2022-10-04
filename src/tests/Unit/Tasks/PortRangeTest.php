<?php

namespace Tests\Unit\Tasks;

use Algorithms\Tasks\PortRange;
use Codeception\Test\Unit;
use UnitTester;

class PortRangeTest extends Unit
{
    protected UnitTester $tester;

    /**
     * @dataProvider  portDataProvider
     */
    public function testGetFreePorts(int $min, int $max, array $busy, array $expectedResult): void
    {
        $repository = new PortRange($min, $max, $busy);
        $actualResult = $repository->getFreePorts();

        $this->assertSame($actualResult, $expectedResult);
    }

    public function portDataProvider(): array
    {
        return [
            ['min' => 30000, 'max' => 32000, 'busy' => [30100, 30200], 'expectedResult' => [[30000, 30099], [30101, 30199], [30201, 32000]]],
            ['min' => 30000, 'max' => 32000, 'busy' => [], 'expectedResult' => [[30000, 32000]]],
            ['min' => 30000, 'max' => 30000, 'busy' => [], 'expectedResult' => [[30000, 30000]]],
            ['min' => 30000, 'max' => 30002, 'busy' => [30000, 30001, 30002], 'expectedResult' => []],
            ['min' => 30000, 'max' => 30002, 'busy' => [30000, 30002], 'expectedResult' => [[30001, 30001]]],
        ];
    }
}
