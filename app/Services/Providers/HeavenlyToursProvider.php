<?php

namespace App\Services\Providers;

use App\Contracts\Services\ProviderService;
use App\Models\Search;
use App\Repositories\Api\HeavenlyToursApi;
use Illuminate\Http\Client\RequestException;

class HeavenlyToursProvider implements ProviderService
{
    public function __construct(
        private HeavenlyToursApi $repository
    ) {
    }

    public function search(Search $search): array
    {
        return [];
    }

    /**
     * @throws RequestException
     */
    public function tours(): array
    {
        return $this->repository->getTours();
    }

    public function getToursAvailability(string $tourID)
    {
        // TODO: Implement getToursAvailability() method.
    }


}
