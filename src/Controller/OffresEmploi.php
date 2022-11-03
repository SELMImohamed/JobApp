<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffresEmploi extends AbstractController
{
    /**
     * @Route("/offresEmploi", name = "offres_emploi")
     */

    public function offresEmploi()
    {
        return $this->render('app/offresEmploi.html.twig');
    }
}
