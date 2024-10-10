<?php

namespace App\Contracts\Services;

interface ProviderService
{

    public function tours(): array;

    public function getToursAvailability(string $tourID);
}
