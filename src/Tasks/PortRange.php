<?php

namespace Algorithms\Tasks;

class PortRange
{
    public function __construct(private int $min, private int $max, private array $busy) {}

    public function getFreePorts(): array
    {
        $ranges = [];

        if (!$this->busy) {
            $ranges[] = [$this->min, $this->max];
        }

        $firstBusyKey = array_key_first($this->busy);
        $lastBusyKey = array_key_last($this->busy);

        if (null !== $firstBusyKey && $this->min !== $this->busy[$firstBusyKey]) {
            $ranges[] = [$this->min, $this->busy[$firstBusyKey] - 1];
        }

        for ($i = 0; $i < count($this->busy) - 1; $i++) {
            $currentBusyPort = $this->busy[$i];
            $nextBusyPort = $this->busy[$i + 1];

            if ($currentBusyPort === ($nextBusyPort - 1)) {
                continue;
            }

            $ranges[] = [$currentBusyPort + 1, $nextBusyPort - 1];
        }

        if (null !== $lastBusyKey && $this->max !== $this->busy[$lastBusyKey]) {
            $ranges[] = [$this->busy[$lastBusyKey] + 1, $this->max];
        }

        return $ranges;
    }
}
