<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ShippingMethod;

class ShippingMethodFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create and persist example shipping methods
        $shippingMethod = new ShippingMethod();
        $shippingMethod->setName('Standard');
        $shippingMethod->setDeliveryTime(3);
        $manager->persist($shippingMethod);
        $this->addReference('shipping-standard', $shippingMethod);

        // Flush to save the shipping methods in the database
        $manager->flush();
    }
}