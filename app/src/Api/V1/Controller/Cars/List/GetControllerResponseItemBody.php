<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Cars\List;

use App\Api\V1\Entity\Car;

final class GetControllerResponseItemBody
{
    public function __construct(
        public readonly int $id,
        public readonly array $brand,
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
            photo: $car->getPhoto(),
            price: $car->getPrice(),
        );
    }
}