<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Order;

class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Create and persist an example order
        $order = new Order();
        $order->addProduct($this->getReference('product-laptop'));
        $order->addProduct($this->getReference('product-mouse'));
        $order->setShippingMethod($this->getReference('shipping-standard'));
        $order->setCustomerLocation('outside_major_city');
        $manager->persist($order);

        // Flush to save the order in the database
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class,
            ShippingMethodFixtures::class,
        ];
    }
}