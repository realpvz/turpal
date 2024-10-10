<?php

namespace App\Services\Providers;

use App\Contracts\Services\ProviderService;
use App\DataTransferObjects\HeavenlyTours\TourDTO;
use App\Models\Search;
use App\Repositories\Api\HeavenlyToursApi;
use App\Transformers\HeavenlyTours\ProductTransformer;
use Illuminate\Http\Client\RequestException;

class HeavenlyToursProvider implements ProviderService
{
    public function __construct(
        private readonly HeavenlyToursApi $repository,
        private readonly ProductTransformer $productTransformer
    ) {
    }

    /**
     * @throws RequestException
     */
    public function search(Search $search): array
    {
        $products = $this->repository->getTours();

        // For example: if we want to request all dates between start date and, end date
        // real-time request is a bad way.
        // I put only startDate for example for this provider.
        $pricesMapWithProductID = $this->repository->getTourPrices($search->getStartDate());

        $selectedProducts = [];
        foreach ($products as $product) {
            if ($pricesMapWithProductID[$product->getId()] ?? false) {
                $tour = $this->repository->detail($product->getId());
                $tour->setPrice($pricesMapWithProductID[$product->getId()]);
                $selectedProducts[] = $tour;
            }
        }

        return array_map(
            fn (TourDTO $tour) => $this->productTransformer->transform($tour),
            $selectedProducts,
        );
    }
}
