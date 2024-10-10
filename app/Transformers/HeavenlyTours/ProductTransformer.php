<?php

namespace App\Transformers\HeavenlyTours;

use App\DataTransferObjects\HeavenlyTours\TourDTO;
use App\DataTransferObjects\ProductDTO;
use App\Enums\Currency;

class ProductTransformer
{
    public function transform(TourDTO $tour): ProductDTO
    {
        return new ProductDTO(
            title: $tour->getTitle(),
            minimumPrice: $tour->getPrice(),
            currency: Currency::AED,
            thumbnail: $tour->getThumbnail()
        );
    }
}
