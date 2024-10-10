<?php

namespace App\Services\Providers;

use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Services\ProviderService;
use App\Models\Search;
use App\Transformers\Travello\ProductTransformer;

class TravelloProvider implements ProviderService
{
    public function __construct(
        private readonly ProductRepository $repository,
        private ProductTransformer $productTransformer,
    )
    {
    }

    public function search(Search $search): array
    {
        $products =  $this->repository->available($search);

        return array_map(fn (array $product) => $this->productTransformer->transform($product), $products);
    }
}
