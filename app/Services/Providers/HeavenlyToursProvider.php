<?php

namespace App\Services\Providers;

use App\Contracts\Services\ProviderService;
use App\Repositories\Api\HeavenlyToursApi;

class HeavenlyToursProvider implements ProviderService
{
    public function __construct(
        private HeavenlyToursApi $repository
    ) {
    }

}
