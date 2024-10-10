<?php

namespace App\Repositories\Api;

use App\DataTransferObjects\HeavenlyTours\TourDTO;
use App\Enums\HeavenlyTours\ApiEndpoint;
use DateTimeInterface;
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
            $tour['city'],
        ), $tours);
    }

    /**
     * @throws RequestException
     */
    public function getTourPrices(DateTimeInterface $travelDate): array
    {
        $prices = $this->run(ApiEndpoint::GetAllTourPrices);

        return array_combine(array_column($prices, 'tourId'), array_column($prices, 'price'));
    }

    public function detail(string $tourID): TourDTO
    {
        $tourDetail = $this->run(ApiEndpoint::ShowTours, $tourID);

        $thumbnail = array_filter($tourDetail['photos'], function (array $photo) {
            return $photo['type'] === 'thumbnail';
        })[0]['url'];

        return new TourDTO(
            $tourDetail['id'],
            $tourDetail['title'],
            $tourDetail['excerpt'],
            $tourDetail['city'],
            $thumbnail
        );
    }

    /**
     * @throws RequestException
     */
    public function run(ApiEndpoint $endpoint, string $tourID = null)
    {
        $endpointValue = $endpoint->isWildcard() ? sprintf($endpoint->value, $tourID) : $endpoint->value;

        $response = Http::baseUrl($this->baseUrl)->withOptions([
            'proxy' => 'http://localhost:8889'
        ])->get($endpointValue);

        $response->throwIf($response->successful());

        return $response->json();
    }
}
