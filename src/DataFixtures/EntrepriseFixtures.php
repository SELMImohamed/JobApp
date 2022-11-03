<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixtures extends Fixture
{

    public const COMPANY_AUDIT = "audit";

    public function load(ObjectManager $manager)
    {
        $microsoft = new Entreprise();
        $microsoft->setNomEntreprise("Microsoft")
            ->setSecteur("Informatique");

        $manager->persist($microsoft);

        $bmw = new Entreprise();
        $bmw->setNomEntreprise("Bmw")
            ->setSecteur("Automobile");

        $manager->persist($bmw);

        $apple = new Entreprise();
        $apple->setNomEntreprise("Apple")
            ->setSecteur("Informatique");

        $manager->persist($apple);

        $activision = new Entreprise();
        $activision->setNomEntreprise("Activision")
            ->setSecteur("Jeux Video");

        $manager->persist($activision);

        $audi = new Entreprise();
        $audi->setNomEntreprise("Audi")
            ->setSecteur("Automobile");
        $this->addReference(self::COMPANY_AUDIT, $audi);
        $manager->persist($audi);


        $manager->flush();
    }
}
