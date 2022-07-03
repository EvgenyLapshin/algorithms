<?php

declare(strict_types=1);

namespace Algorithms\Tasks;

/**
 * Дан массив положительных целых чисел (длинны N), описывающий цену единицы товара на протяжении N дней.
 * Мы каждый день производим по одной единице товара. У нас есть склад, где мы можем хранить товар.
 * Требуется вычислить максимальную сумму, которую мы можем выручить за произведённые нами товары, с учётом,
 * что к концу периода все товары должны быть проданы.
 */
class MaxPrice
{
    public function fromLeft(array $priceByDays): int
    {
        $sum = 0;

        do {
            if (!$priceByDays) {
                break;
            }

            $maxPrice = max($priceByDays);
            $maxValues = array_keys($priceByDays, $maxPrice);

            if (!array_key_exists(0, $maxValues)) {
                break;
            }

            $maxPriceKey = $maxValues[0];
            $daysCount = $maxPriceKey + 1;

            $sum += $daysCount * $maxPrice;

            if ($daysCount === count($priceByDays)) {
                break;
            }

            array_splice($priceByDays, 0, $daysCount);
        } while (true);


        return $sum;
    }

    public function fromRight(array $priceByDays): int
    {
        $sum = 0;
        $maxPrice = 0;
        for ($i = count($priceByDays) - 1; $i >= 0; $i--) {
            if ($maxPrice < $priceByDays[$i]) {
                $maxPrice = $priceByDays[$i];
            }

            $sum += $maxPrice;
        }

        return $sum;
    }
}
