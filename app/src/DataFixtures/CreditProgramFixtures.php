<?php

namespace App\DataFixtures;

use App\Api\V1\Entity\CreditProgram;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CreditProgramFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $creditProgramA = (new CreditProgram())
            ->setTitle('Credit program A')
            ->setInterestRate(15.9)
            ->setCreditAmountFrom(1)
            ->setCreditAmountTo(1000000)
            ->setLoanTermFrom(1)
            ->setLoanTermTo(32);
        $manager->persist($creditProgramA);

        $creditProgramB = (new CreditProgram())
            ->setTitle('Credit program B')
            ->setInterestRate(15.5)
            ->setCreditAmountFrom(1000000)
            ->setCreditAmountTo(3000000)
            ->setLoanTermFrom(1)
            ->setLoanTermTo(32);
        $manager->persist($creditProgramB);

        $creditProgramC = (new CreditProgram())
            ->setTitle('Credit program C')
            ->setInterestRate(15.1)
            ->setCreditAmountFrom(3000000)
            ->setCreditAmountTo(100000000)
            ->setLoanTermFrom(1)
            ->setLoanTermTo(32);
        $manager->persist($creditProgramC);

        $creditProgramD = (new CreditProgram())
            ->setTitle('Credit program D')
            ->setInterestRate(15.6)
            ->setCreditAmountFrom(1)
            ->setCreditAmountTo(1000000)
            ->setLoanTermFrom(33)
            ->setLoanTermTo(64);
        $manager->persist($creditProgramD);

        $creditProgramE = (new CreditProgram())
            ->setTitle('Credit program E')
            ->setInterestRate(15.2)
            ->setCreditAmountFrom(1000000)
            ->setCreditAmountTo(3000000)
            ->setLoanTermFrom(33)
            ->setLoanTermTo(64);
        $manager->persist($creditProgramE);

        $creditProgramF = (new CreditProgram())
            ->setTitle('Credit program F')
            ->setInterestRate(14.8)
            ->setCreditAmountFrom(3000000)
            ->setCreditAmountTo(100000000)
            ->setLoanTermFrom(33)
            ->setLoanTermTo(64);
        $manager->persist($creditProgramF);

        $creditProgramG = (new CreditProgram())
            ->setTitle('Credit program G')
            ->setInterestRate(15.3)
            ->setCreditAmountFrom(1)
            ->setCreditAmountTo(1000000)
            ->setLoanTermFrom(65)
            ->setLoanTermTo(300);
        $manager->persist($creditProgramG);

        $creditProgramH = (new CreditProgram())
            ->setTitle('Credit program H')
            ->setInterestRate(14.9)
            ->setCreditAmountFrom(1000000)
            ->setCreditAmountTo(3000000)
            ->setLoanTermFrom(65)
            ->setLoanTermTo(300);
        $manager->persist($creditProgramH);

        $creditProgramI = (new CreditProgram())
            ->setTitle('Credit program I')
            ->setInterestRate(14.5)
            ->setCreditAmountFrom(3000000)
            ->setCreditAmountTo(100000000)
            ->setLoanTermFrom(65)
            ->setLoanTermTo(300);
        $manager->persist($creditProgramI);

        $manager->flush();
    }
}
