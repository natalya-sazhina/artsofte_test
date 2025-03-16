<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Cars\Item;

use App\Api\V1\Entity\Car;

final class GetControllerResponseBody
{
    public function __construct(
        public readonly int $id,
        public readonly array $brand,
        public readonly array $model,
        public readonly string $photo,
        public readonly int $price,
    ) {
    }

    public static function fromEntity(Car $car): self {
        return new self(
            id:    $car->getId(),
            brand: [
                'id'   => $car->getModel()->getBrand()->getId(),
                'name' => $car->getModel()->getBrand()->getName(),
            ],
            model: [
                'id'   => $car->getModel()->getId(),
                'name' => $car->getModel()->getName(),
            ],
            photo: $car->getPhoto(),
            price: $car->getPrice(),
        );
    }
}