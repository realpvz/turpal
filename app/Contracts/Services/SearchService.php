<?php

namespace App\Contracts\Services;

use App\Models\Search;

interface SearchService
{
    public function search(Search $search);
}
