<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\SearchRequest;
use App\Http\Resources\V1\ProductResource;
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(SearchRequest $request)
    {
        $search = $request->toSearch();

        $products = $this->searchService->search($search);

        return ProductResource::collection($products);
    }
}
