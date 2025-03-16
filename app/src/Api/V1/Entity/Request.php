<?php

declare(strict_types=1);

namespace App\Api\V1\Entity;

use App\Api\V1\Repository\RequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'request')]
#[ORM\Entity(repositoryClass: RequestRepository::class)]
class Request
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Car::class)]
    #[ORM\JoinColumn(name: 'id_car', referencedColumnName: 'id', nullable: false)]
    private Car $car;

    #[ORM\ManyToOne(targetEntity: CreditProgram::class)]
    #[ORM\JoinColumn(name: 'id_credit_program', referencedColumnName: 'id', nullable: false)]
    private CreditProgram $creditProgram;

    #[ORM\Column(name: 'initial_payment', type: 'integer', nullable: false)]
    private int $initialPayment;

    #[ORM\Column(name: 'loan_term', type: 'integer', nullable: false)]
    private int $loanTerm;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function setCar(Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getCreditProgram(): CreditProgram
    {
        return $this->creditProgram;
    }

    public function setCreditProgram(CreditProgram $creditProgram): self
    {
        $this->creditProgram = $creditProgram;

        return $this;
    }

    public function getInitialPayment(): int
    {
        return $this->initialPayment;
    }

    public function setInitialPayment(int $initialPayment): self
    {
        $this->initialPayment = $initialPayment;

        return $this;
    }

    public function getLoanTerm(): int
    {
        return $this->loanTerm;
    }

    public function setLoanTerm(int $loanTerm): self
    {
        $this->loanTerm = $loanTerm;

        return $this;
    }
}
