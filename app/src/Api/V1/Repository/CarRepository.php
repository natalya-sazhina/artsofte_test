<?php

declare(strict_types=1);

namespace App\Api\V1\Repository;

use App\Api\V1\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function getCarPaginator(): Paginator
    {
        return new Paginator(
            $this->createQueryBuilder('c')
                ->select('c')
                ->orderBy('c.id', 'desc')
                ->getQuery(),
        );
    }
}
