<?php

namespace App\Services;

use App\Contracts\Repositories\ProviderRepository;
use App\Models\Search;

class SearchService implements \App\Contracts\Services\SearchService
{
    public function __construct(
        private readonly ProviderRepository $providerRepository
    )
    {
    }

    public function search(Search $search): array
    {
        $providers = $this->providerRepository->all();
        $products = [];
        // we can put the search process into job when we have more providers
        // to run them parallelism
        foreach ($providers as $provider) {
            $products[] = $provider->search($search);
        }

        return array_merge(...$products);
    }
}
