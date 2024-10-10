<?php

namespace App\Repositories\Api;

use App\DataTransferObjects\HeavenlyTours\TourDTO;
use App\Enums\HeavenlyTours\ApiEndpoint;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class HeavenlyToursApi
{
    private string $baseUrl = 'http://161.35.193.238:3006/api';

    /**
     * @throws RequestException
     *
     * @return array<TourDTO>doc
     */
    public function getTours(): array
    {
        $tours =  $this->run(ApiEndpoint::GetTours);

        return array_map(fn (array $tour) => new TourDTO(
            $tour['id'],
            $tour['title'],
            $tour['excerpt'],
            $tour['city']
        ), $tours);
    }

    public function getTourPrices(string $tourID): array
    {
        $prices = $this->run(ApiEndpoint::GetAllTourPrices, $tourID);

        return array_combine(array_column($prices, 'tourId'), array_column($prices, 'price'));
    }

    /**
     * @throws RequestException
     */
    public function run(ApiEndpoint $endpoint, string $tourID = null)
    {
        $endpointValue = $endpoint->isWildcard() ? sprintf($endpoint->isWildcard(), $tourID) : $endpoint->value;

        $response = Http::baseUrl($this->baseUrl)->withOptions([
            'proxy' => 'http://localhost:8889'
        ])->timeout(5)->get($endpointValue);

        $response->throwIf($response->successful());

        return $response->json();
    }
}
