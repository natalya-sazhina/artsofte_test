<?php

namespace App\DataFixtures;

use App\Api\V1\Entity\Brand;
use App\Api\V1\Entity\Model;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ModelFixtures extends Fixture implements DependentFixtureInterface
{
    public const MODEL_ONE_REFERENCE = 'model-one';
    public const MODEL_TWO_REFERENCE = 'model-two';
    public const MODEL_THREE_REFERENCE = 'model-three';

    public function load(ObjectManager $manager): void
    {
        $modelOne = (new Model())
            ->setName('model one')
            ->setBrand($this->getReference(BrandFixtures::BRAND_ONE_REFERENCE, Brand::class));
        $manager->persist($modelOne);

        $modelTwo = (new Model())
            ->setName('model two')
            ->setBrand($this->getReference(BrandFixtures::BRAND_TWO_REFERENCE, Brand::class));
        $manager->persist($modelTwo);

        $modelThree = (new Model())
            ->setName('model three')
            ->setBrand($this->getReference(BrandFixtures::BRAND_ONE_REFERENCE, Brand::class));
        $manager->persist($modelThree);

        $manager->flush();

        $this->addReference(self::MODEL_ONE_REFERENCE, $modelOne);
        $this->addReference(self::MODEL_TWO_REFERENCE, $modelTwo);
        $this->addReference(self::MODEL_THREE_REFERENCE, $modelThree);
    }

    public function getDependencies(): array
    {
        return [
            BrandFixtures::class,
        ];
    }
}
