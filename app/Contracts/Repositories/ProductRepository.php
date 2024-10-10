<?php

namespace App\Contracts\Repositories;

use App\Models\Search;

interface ProductRepository
{
    public function available(Search $search): array;
}
