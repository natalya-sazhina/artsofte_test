<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Request;

use Symfony\Component\Validator\Constraints as Assert;

final class PostControllerRequestBody
{
    public function __construct(
        #[Assert\NotNull]
        #[Assert\Type('integer')]
        public readonly int $carId,

        #[Assert\NotNull]
        #[Assert\Type('integer')]
        public readonly int $programId,

        #[Assert\NotNull]
        #[Assert\Type('integer')]
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(50_000_000)]
        public readonly int $initialPayment,

        #[Assert\NotNull]
        #[Assert\Type('integer')]
        #[Assert\GreaterThanOrEqual(1)]
        #[Assert\LessThanOrEqual(300)]
        public readonly int $loanTerm,
    ) {
    }
}