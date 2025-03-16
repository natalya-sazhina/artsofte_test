<?php

declare(strict_types=1);

namespace App\Api\V1\Repository;

use App\Api\V1\Dto\CreditDto;
use App\Api\V1\Entity\CreditProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreditProgram>
 */
class CreditProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreditProgram::class);
    }

    public function findByCreditAmountAndLoanTerm(CreditDto $creditDto): CreditProgram
    {
        return $this->createQueryBuilder('cp')
            ->where('cp.creditAmountFrom <= :creditAmount AND cp.creditAmountTo > :creditAmount')
            ->andWhere('cp.loanTermFrom <= :loanTerm AND cp.loanTermTo >= :loanTerm')
            ->setParameters(new ArrayCollection([
                new Parameter('creditAmount', $creditDto->price - $creditDto->initialPayment),
                new Parameter('loanTerm', $creditDto->loanTerm),
            ]))
            ->getQuery()
            ->getSingleResult();
    }
}
