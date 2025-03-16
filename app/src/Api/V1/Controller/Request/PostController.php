<?php

declare(strict_types=1);

namespace App\Api\V1\Controller\Request;

use App\Api\V1\Entity\Car;
use App\Api\V1\Entity\CreditProgram;
use App\Api\V1\Entity\Request;
use App\Api\V1\Repository\CarRepository;
use App\Api\V1\Repository\CreditProgramRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    public function __construct(
        public CarRepository $carRepository,
        public CreditProgramRepository $creditProgramRepository,
        public EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/api/v1/request', name: 'create_request', methods: ['POST'])]
    public function __invoke(
        #[MapRequestPayload] PostControllerRequestBody $requestDto,
    ): JsonResponse
    {
        $car = $this->carRepository->find($requestDto->carId);
        $creditProgram = $this->creditProgramRepository->find($requestDto->programId);

        if (!$this->validate($requestDto, $car, $creditProgram)) {
            return new JsonResponse(['success' => false]);
        }

        $this->entityManager->persist($this->makeEntity($requestDto, $car, $creditProgram));
        $this->entityManager->flush();

        return new JsonResponse(['success' => true]);
    }

    private function validate(
        PostControllerRequestBody $requestDto,
        ?Car $car,
        ?CreditProgram $creditProgram,
    ): bool {
        if ($car === null || $creditProgram === null) {
            return false;
        }

        $creditAmount = $car->getPrice() - $requestDto->initialPayment;

        return $creditAmount >= $creditProgram->getCreditAmountFrom()
            && $creditAmount < $creditProgram->getCreditAmountTo()
            && $requestDto->loanTerm >= $creditProgram->getLoanTermFrom()
            && $requestDto->loanTerm <= $creditProgram->getLoanTermTo();
    }

    private function makeEntity(
        PostControllerRequestBody $requestDto,
        Car $car,
        CreditProgram $creditProgram,
    ): Request {
        return (new Request())
            ->setCar($car)
            ->setCreditProgram($creditProgram)
            ->setInitialPayment($requestDto->initialPayment)
            ->setLoanTerm($requestDto->loanTerm);
    }
}