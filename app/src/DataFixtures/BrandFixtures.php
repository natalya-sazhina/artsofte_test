<?php

namespace App\DataFixtures;

use App\Api\V1\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public const BRAND_ONE_REFERENCE = 'brand-one';
    public const BRAND_TWO_REFERENCE = 'brand-two';

    public function load(ObjectManager $manager): void
    {
        $brandOne = (new Brand())->setName('Brand one');
        $manager->persist($brandOne);

        $brandTwo = (new Brand())->setName('Brand two');
        $manager->persist($brandTwo);

        $manager->flush();

        $this->addReference(self::BRAND_ONE_REFERENCE, $brandOne);
        $this->addReference(self::BRAND_TWO_REFERENCE, $brandTwo);
    }
}
