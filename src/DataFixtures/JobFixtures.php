<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //for ($i = 0; $i < 2; $i++) {
        $job = new Job();
        $job->setIdEntreprise(1)
            ->setDate(new \DateTime())
            ->setNomOffre("Développeur Front")
            ->setDescription("Nous recherchons un développeur front pour travailler avec notre équipe")
            ->setCriteres("HTML/CSS - Javascript - ReactJS");

        $manager->persist($job);

        $job = new Job();
        $job->setIdEntreprise(2)
            ->setDate(new \DateTime())
            ->setNomOffre("Développeur Back")
            ->setDescription("Nous recherchons un développeur back pour travailler avec notre équipe")
            ->setCriteres("Javascript - NodeJS - Python");

        $manager->persist($job);

        $job = new Job();
        $job->setIdEntreprise(3)
            ->setDate(new \DateTime())
            ->setNomOffre("Développeur FullStack")
            ->setDescription("Nous recherchons un développeur fullstack pour travailler avec notre équipe")
            ->setCriteres("Javascript - ReactJS - NodeJS - Python");

        $manager->persist($job);
        //}

        $manager->flush();
    }
}
