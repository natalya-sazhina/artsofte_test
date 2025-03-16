<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Credit;

use App\Api\V1\Entity\CreditProgram;

final class GetControllerResponseBody
{
    public function __construct(
        public readonly int $programId,
        public readonly float $interestRate,
        public readonly int $monthlyPayment,
        public readonly string $title,
    ) {
    }

    public static function makeResponse(CreditProgram $creditProgram, int $monthlyPayment): self {
        return new self(
            programId:      $creditProgram->getId(),
            interestRate:   $creditProgram->getInterestRate(),
            monthlyPayment: $monthlyPayment,
            title:          $creditProgram->getTitle(),
        );
    }
}