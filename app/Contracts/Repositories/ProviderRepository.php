<?php

namespace App\Contracts\Repositories;

use App\Contracts\Services\ProviderService;

interface ProviderRepository
{
    /**
     * @return array<ProviderService>
     */
    public function all(): array;
}
