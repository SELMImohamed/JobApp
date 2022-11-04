<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfileFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $profil = new Profile();
        $profil->setNameProfile("Singe")
            ->setSurnameProfile("Alan")
            ->setAge(21)
            ->setCareer("Brevet des collèges")
            ->setSkillProfile("HTML");

        $manager->persist($profil);

        $manager->flush();
    }
}
