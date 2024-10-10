<?php

namespace App\Http\Resources\V1;

use App\DataTransferObjects\ProductDTO;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property ProductDTO $resource
 */
class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->resource->getTitle(),
            'minimumPrice' => $this->resource->getMinimumPriceWithCurrency(),
            'thumbnail' => $this->resource->getThumbnail()
        ];
    }
}
