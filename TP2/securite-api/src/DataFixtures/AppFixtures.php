<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Customer;
use App\Entity\Invoice;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($c = 0; $c < 30; $c++ ){
            $customer = new Customer();
            $customer->setFirstName($faker->firstName())
                     ->setLastName($faker->lastName)
                     ->setCompany($faker->company)
                     ->setEmail($faker->email);

            $manager->persist($customer);

            for($i = 0; $i < mt_rand(3, 10); $i++) {
                $invoice = new Invoice();
                $invoice->setAmount($faker->randomFloat(2,250,5000))
                        ->setSendAt($faker->dateTimeBetween('-6 months'))
                        ->setStatus($faker->randomElement(['SENT','PAID', 'CANCELLED']))
                        ->setCustomer($customer);

                $manager->persist($invoice);
            }
        }

        $manager->flush();
    }
}
