<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Cars\List;

use App\Api\V1\Dto\PaginatorDto;
use App\Api\V1\Entity\Car;
use App\Api\V1\Repository\CarRepository;
use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

class GetController extends AbstractController
{
    public function __construct(
        public CarRepository $carRepository,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'List of cars',
        content: new OA\JsonContent(properties: [
            new OA\Property(
                property: 'data',
                type: 'array',
                items: new OA\Items(ref: new Model(type: GetControllerResponseItemBody::class))
            ),
            new OA\Property(
                property: 'pagination',
                properties: [
                    new OA\Property(property: 'rows', type: 'integer'),
                    new OA\Property(property: 'pages', type: 'integer'),
                ],
                type: 'object',
            ),
        ])
    )]
    #[Route('/api/v1/cars', name: 'cars_list', methods: ['GET'])]
    public function __invoke(
        #[MapQueryString] PaginatorDto $paginatorDto = new PaginatorDto(),
    ): JsonResponse
    {
        $carsPaginator = $this->carRepository->getCarPaginator();
        $rows = count($carsPaginator);
        $pagesCount = ceil($rows / $paginatorDto->pageSize);

        $carsPaginator
            ->getQuery()
            ->setFirstResult(($paginatorDto->currentPage - 1) * $paginatorDto->pageSize)
            ->setMaxResults($paginatorDto->pageSize);

        return new JsonResponse(
            [
                'data'       =>  array_map(
                    static fn (Car $car) => GetControllerResponseItemBody::fromEntity($car),
                    $carsPaginator->getQuery()->getResult(),
                ),
                'pagination' => [
                    'rows'  => $rows,
                    'pages' => $pagesCount,
                ],
            ],
        );
    }
}