<?php

namespace App\Transformers\Travello;

use App\DataTransferObjects\ProductDTO;
use App\Enums\Currency;

class ProductTransformer
{
    public static function transform(array $data)
    {
        $minimumPrices = array_column($data['availabilities'], 'price');
        $minPrice = min($minimumPrices);

        return new ProductDTO(
            title: $data['name'],
            minimumPrice: (float) $minPrice,
            currency: Currency::AED,
            thumbnail: $data['thumbnail'],
        );
    }
}
