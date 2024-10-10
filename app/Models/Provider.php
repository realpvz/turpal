<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    const PROVIDERS_NAMESPACE = 'App\Services\Providers';

    protected $guarded = [];

    public function getServiceInstance()
    {
        $provider = sprintf('%s\%sProvider', self::PROVIDERS_NAMESPACE, $this->name);

        return app($provider);
    }
}
