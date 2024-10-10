<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\ProviderRepository as ProviderRepositoryContract;
use App\Models\Provider;
use App\Repositories\Api\HeavenlyToursApi;

class ProviderRepository implements ProviderRepositoryContract
{
    public function __construct(
        private readonly Provider $model
    )
    {
    }

    public function all(): array
    {
        // when we put providers into database
        // return  $this->model->newQuery()->get()->map(function (Provider $provider) {
        // return $provider->getServiceInstance();
        // })->toArray();

        // mock

        return [
            app(HeavenlyToursApi::class),
        ];
    }
}
