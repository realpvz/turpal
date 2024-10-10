<?php

namespace App\Enums\HeavenlyTours;

enum ApiEndpoint: string
{
    case GetTours = 'tours';
    case ShowTours = 'tours/%s';
    case GetAllTourPrices = 'tour-prices';
    case GetAvailabilityOfTour = 'tours/%s/availability';

    public function isWildcard(): bool
    {
        return str_contains($this->value, '%s');
    }
}
