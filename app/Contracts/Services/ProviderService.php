<?php

namespace App\Contracts\Services;

use App\Models\Search;

interface ProviderService
{
    public function search(Search $search): array;
}
