<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= 10; $i++) {
            $job = new Job();
            $job->setIdEntreprise(1)
                ->setDate(new \DateTime())
                ->setNomOffre("Offre numero $i")
                ->setDescription("ceci est une offre")
                ->setCriteres("mysql php reactjs");

            $manager->persist($job);
        }

        $manager->flush();
    }
}
