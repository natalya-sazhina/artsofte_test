<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Cars\Item;

use App\Api\V1\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class GetController extends AbstractController
{
    #[Route('/api/v1/cars/{id}', name: 'car_item', methods: ['GET'])]
    public function __invoke(Car $car): JsonResponse
    {
        return new JsonResponse(['data' => GetControllerResponseBody::fromEntity($car)]);
    }
}