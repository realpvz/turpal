<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Models\Search;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository implements \App\Contracts\Repositories\ProductRepository
{
    public function __construct(
        private readonly Product $product
    )
    {
    }

    public function available(Search $search): array
    {
        return $this->product->newQuery()->whereHas('availabilities', function (Builder $query) use ($search) {
            return $query->where('start_time', '>=', $search->getStartDate())->where('end_time', '<=', $search->getEndDate());
        })->with('availabilities')->get()?->toArray() ?? [];
    }
}
