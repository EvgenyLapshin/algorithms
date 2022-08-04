<?php

namespace Algorithms\Tasks;

class TwoSum
{
    /**
     * Time complexity: O(n^2)
     *
     * @param $nums
     * @param $target
     *
     * @return array|int[]
     */
    public function bruteForceSearch($nums, $target): array
    {
        $result = [];
        for ($i = 0; $i < count($nums) - 1; $i++) {
            for ($j = $i + 1, $jMax = count($nums); $j < $jMax; $j++) {
                if ($nums[$i] + $nums[$j] === $target) {
                    $result = [$i, $j];

                    break;
                }
            }
        }

        return $result;
    }

    /**
     * Time complexity: O(n)
     *
     * @param $nums
     * @param $target
     *
     * @return array
     */
    public function hashmap($nums, $target): array
    {
        $result = [];
        $hashmap = [];
        foreach ($nums as $key => $value) {
            $diff = $target - $value;
            if (isset($hashmap[$diff])) {
                $result = [$hashmap[$diff], $key];

                break;
            }

            $hashmap[$value] = $key;
        }

        return $result;
    }
}
