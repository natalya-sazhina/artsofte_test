<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Credit;

use App\Api\V1\Dto\CreditDto;
use App\Api\V1\Repository\CreditProgramRepository;
use App\Api\V1\Service\CreditCalculatorService;
use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

class GetController extends AbstractController
{
    public function __construct(
        public CreditProgramRepository $creditProgramRepository,
        public CreditCalculatorService $creditCalculatorService,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Determine the credit program and monthly payment',
        content: new OA\JsonContent(ref: new Model(type: GetControllerResponseBody::class))
    )]
    #[OA\Response(response: 400, description: 'Bad request')]
    #[OA\Response(response: 404, description: 'Not found')]
    #[Route('/api/v1/credit/calculate', name: 'credit_calculate', methods: ['GET'])]
    public function calculate(
        #[MapQueryString] CreditDto $creditDto,
    ): JsonResponse
    {
        if ($creditDto->price - $creditDto->initialPayment < 1) {
            return new JsonResponse(['message' => 'Credit amount should be greater than 0'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $creditProgram = $this->creditProgramRepository->findByCreditAmountAndLoanTerm($creditDto);
        } catch (Throwable) {
            return new JsonResponse(['message' => 'Credit program not found'], Response::HTTP_NOT_FOUND);
        }

        $monthlyPayment = $this->creditCalculatorService->calculateMonthlyPayment(
            $creditDto->price - $creditDto->initialPayment,
            $creditProgram->getInterestRate(),
            $creditDto->loanTerm,
        );

        return new JsonResponse(['data' => GetControllerResponseBody::makeResponse($creditProgram, $monthlyPayment)]);
    }
}