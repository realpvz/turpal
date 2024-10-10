<?php

namespace App\DataTransferObjects\HeavenlyTours;

class TourDTO
{
    public function __construct(
        private string $id,
        private string $title,
        private string $excerpt,
        private string $city,
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    public function getCity(): string
    {
        return $this->city;
    }
}
