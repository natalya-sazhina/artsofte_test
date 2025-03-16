<?php

declare(strict_types=1);

namespace App\Api\V1\Entity;

use App\Api\V1\Repository\CreditProgramRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'credit_program')]
#[ORM\Entity(repositoryClass: CreditProgramRepository::class)]
class CreditProgram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private int $id;

    #[ORM\Column(name: 'title', type: 'string', nullable: false)]
    private string $title;

    #[ORM\Column(name: 'interest_rate', type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private float $interestRate;

    #[ORM\Column(name: 'credit_amount_from', type: 'float', nullable: false)]
    private float $creditAmountFrom;

    #[ORM\Column(name: 'credit_amount_to', type: 'float', nullable: false)]
    private float $creditAmountTo;

    #[ORM\Column(name: 'loan_term_from', type: 'integer', nullable: false)]
    private int $loanTermFrom;

    #[ORM\Column(name: 'loan_term_to', type: 'integer', nullable: false)]
    private int $loanTermTo;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    public function setInterestRate(float $interestRate): self
    {
        $this->interestRate = $interestRate;

        return $this;
    }

    public function getCreditAmountFrom(): float
    {
        return $this->creditAmountFrom;
    }

    public function setCreditAmountFrom(float $creditAmountFrom): self
    {
        $this->creditAmountFrom = $creditAmountFrom;

        return $this;
    }

    public function getCreditAmountTo(): float
    {
        return $this->creditAmountTo;
    }

    public function setCreditAmountTo(float $creditAmountTo): self
    {
        $this->creditAmountTo = $creditAmountTo;

        return $this;
    }

    public function getLoanTermFrom(): int
    {
        return $this->loanTermFrom;
    }

    public function setLoanTermFrom(int $loanTermFrom): self
    {
        $this->loanTermFrom = $loanTermFrom;

        return $this;
    }

    public function getLoanTermTo(): int
    {
        return $this->loanTermTo;
    }

    public function setLoanTermTo(int $loanTermTo): self
    {
        $this->loanTermTo = $loanTermTo;

        return $this;
    }
}
