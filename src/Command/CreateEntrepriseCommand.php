<?php

namespace App\Command;

use App\Entity\Entreprise;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'create:entreprise',
    description: 'Add a short description for your command',
)]
class CreateEntrepriseCommand extends Command
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('nameentreprise', null, InputOption::VALUE_REQUIRED, 'Name of Entreprise')
            ->addOption('secteurentreprise', null, InputOption::VALUE_REQUIRED, 'Sector of Entreprise')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $name = $input->getOption('nameentreprise');
        $sector = $input->getOption('secteurentreprise');

        $nameentreprise = new Entreprise();
        $nameentreprise->setNomEntreprise($name);
        $nameentreprise->setSecteur($sector);

        $this->em->persist($nameentreprise);
        $this->em->flush();

        $output->write("L'entreprise a bien été créer");

        return Command::SUCCESS;
    }
}