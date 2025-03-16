<?php

namespace App\DataFixtures;

use App\Api\V1\Entity\Car;
use App\Api\V1\Entity\Model;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $carOne = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_ONE_REFERENCE, Model::class))
            ->setPhoto('photo one')
            ->setPrice(1000000);
        $manager->persist($carOne);

        $carTwo = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_TWO_REFERENCE, Model::class))
            ->setPhoto('photo two')
            ->setPrice(2000000);
        $manager->persist($carTwo);

        $carThree = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_TWO_REFERENCE, Model::class))
            ->setPhoto('photo three')
            ->setPrice(3000000);
        $manager->persist($carThree);

        $carFour = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_THREE_REFERENCE, Model::class))
            ->setPhoto('photo four')
            ->setPrice(4000000);
        $manager->persist($carFour);

        $carFive = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_TWO_REFERENCE, Model::class))
            ->setPhoto('photo five')
            ->setPrice(5000000);
        $manager->persist($carFive);

        $carSix = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_ONE_REFERENCE, Model::class))
            ->setPhoto('photo six')
            ->setPrice(6000000);
        $manager->persist($carSix);

        $carSeven = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_ONE_REFERENCE, Model::class))
            ->setPhoto('photo seven')
            ->setPrice(7000000);
        $manager->persist($carSeven);

        $carEight = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_TWO_REFERENCE, Model::class))
            ->setPhoto('photo eight')
            ->setPrice(8000000);
        $manager->persist($carEight);

        $carNine = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_ONE_REFERENCE, Model::class))
            ->setPhoto('photo nine')
            ->setPrice(9000000);
        $manager->persist($carNine);

        $carTen = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_TWO_REFERENCE, Model::class))
            ->setPhoto('photo ten')
            ->setPrice(10000000);
        $manager->persist($carTen);

        $carEleven = (new Car())
            ->setModel($this->getReference(ModelFixtures::MODEL_THREE_REFERENCE, Model::class))
            ->setPhoto('photo eleven')
            ->setPrice(11000000);
        $manager->persist($carEleven);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ModelFixtures::class,
        ];
    }
}
