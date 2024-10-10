<?php

namespace App\DataTransferObjects\HeavenlyTours;

class TourDTO
{
    private float $price;

    public function __construct(
        private readonly string  $id,
        private readonly string  $title,
        private readonly string  $excerpt,
        private readonly string  $city,
        private readonly ?string $thumbnail = null
    )
    {
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
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

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }


}
