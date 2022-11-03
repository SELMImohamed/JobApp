<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Job;


class OffresEmploi extends AbstractController
{
    /**
     * @Route("/offresEmploi", name = "offres_emploi")
     */

    public function offresEmploi()
    {
        $repo = $this->getDoctrine()->getRepository()(Job::class);
        $job = $repo->findAll();


        return $this->render('app/offresEmploi.html.twig', [
            'job' => $job
        ]);
    }
}
