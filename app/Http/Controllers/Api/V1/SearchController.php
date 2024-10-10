<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\SearchRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(
        private SearchService $searchService
    )
    {
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SearchRequest $request)
    {
        $search = $request->toSearch();

        $this->searchService->search();


    }
}
