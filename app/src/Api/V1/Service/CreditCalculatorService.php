<?php

declare(strict_types=1);

namespace App\Api\V1\Service;

final class CreditCalculatorService
{
    public function calculateMonthlyPayment(float $creditAmount, float $interestRate, int $loanTerm): int {
        $monthlyInterestRate = $interestRate / 100 / 12;
        $intermediateCalculation = (1 + $monthlyInterestRate) ** $loanTerm;
        $coefficient = ($intermediateCalculation * $monthlyInterestRate) / ($intermediateCalculation - 1);

        return (int) round($coefficient * $creditAmount);
    }
}