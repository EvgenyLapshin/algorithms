<?php

declare(strict_types=1);

namespace Algorithms\Tasks;

use SplPriorityQueue;

/**
 * @link https://leetcode.com/problems/top-k-frequent-elements/
 */
class TopKFrequent
{
    public function priorityQueue(array $nums, int $k): array
    {
        $result = [];

        $map = array_count_values($nums);
        $priorityQueue = new SplPriorityQueue();
        foreach ($map as $number => $count) {
            $priorityQueue->insert($number, $count);
        }

        $priorityQueue->rewind();
        for ($i = 0; $i < $k; $i++) {
            $result[] = $priorityQueue->extract();
        }

        return $result;
    }

    public function nativeFunctions(array $nums, int $k): array
    {
        $map = array_count_values($nums);
        arsort($map);

        return array_slice(array_keys($map), 0, $k);
    }
}
