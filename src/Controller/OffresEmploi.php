<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Job;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;



class OffresEmploi extends AbstractController
{
    /**
     * @Route("/offresEmploi", name = "offres_emploi")
     */

    public function offresEmploi(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Job::class)->find(2);

        return $this->render('app/offresEmploi.html.twig', [
            'job' => $repository
        ]);
    }
}
