<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create and persist example products
        $product1 = new Product();
        $product1->setName('Laptop');
        $product1->setInStock(true);
        $product1->setLeadTime(0);
        $manager->persist($product1);
        $this->addReference('product-laptop', $product1);

        $product2 = new Product();
        $product2->setName('Mouse');
        $product2->setInStock(false);
        $product2->setLeadTime(5);
        $manager->persist($product2);
        $this->addReference('product-mouse', $product2);

        // Flush to save the products in the database
        $manager->flush();
    }
}
