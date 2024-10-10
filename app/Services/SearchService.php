<?php

namespace App\Services;

use App\Contracts\Repositories\ProviderRepository;

class SearchService implements \App\Contracts\Services\SearchService
{
    public function __construct(
        private readonly ProviderRepository $providerRepository
    )
    {
    }

    public function search()
    {
        $providers = $this->providerRepository->all();

        foreach ($providers as $provider) {
            dd($provider);
        }
    }
}
