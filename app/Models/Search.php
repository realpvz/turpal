<?php

namespace App\Models;

use DateTimeInterface;

class Search
{
    public function __construct(
        private readonly DateTimeInterface $fromDate,
        private readonly DateTimeInterface $toDate,
    )
    {
    }

    public function getFromDate(): DateTimeInterface
    {
        return $this->fromDate;
    }

    public function getToDate(): DateTimeInterface
    {
        return $this->toDate;
    }
}
