<?php

declare(strict_types=1);

namespace App\Api\V1\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class CreditDto
{
    public function __construct(
        #[Assert\NotNull]
        #[Assert\Type('integer')]
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(100_000_000)]
        public readonly int $price,

        #[Assert\NotNull]
        #[Assert\Type('numeric')]
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(50_000_000)]
        #[Assert\Regex(pattern: "/^[0-9]+(\.[0-9][0-9]?)?$/", match: true)]
        public readonly float $initialPayment,

        #[Assert\NotNull]
        #[Assert\Type('integer')]
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(300)]
        public readonly int $loanTerm,
    ) {
    }
}