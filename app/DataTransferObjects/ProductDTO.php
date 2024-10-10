<?php

namespace App\DataTransferObjects;

use App\Enums\Currency;

class ProductDTO
{
    public function __construct(
        private readonly string   $title,
        private readonly float    $minimumPrice,
        private readonly Currency $currency,
        private readonly string   $thumbnail
    )
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMinimumPrice(): float
    {
        return $this->minimumPrice;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    public function getMinimumPriceWithCurrency(): string
    {
        return sprintf('%d %s', $this->getMinimumPrice(), $this->getCurrency()->name);
    }
}
