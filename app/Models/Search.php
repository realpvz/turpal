<?php

namespace App\Models;

use DateTimeInterface;

class Search
{
    public function __construct(
        private readonly DateTimeInterface $startDate,
        private readonly DateTimeInterface $endDate,
    )
    {
    }

    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTimeInterface
    {
        return $this->endDate;
    }
}
