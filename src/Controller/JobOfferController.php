<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Job;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;



class JobOfferController extends AbstractController
{
    /**
     * @Route("/offresEmploi", name = "offres_emploi")
     */

    public function offresEmploi(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Job::class)->findAll();

        return $this->render('app/offresEmploi.html.twig', [
            'job' => $repository
        ]);
    }

    /**
     * @Route("/job/create", name = "create_job")
     */

    public function createJob(Request $request, ManagerRegistry $managerRegistry)
    {
        $job = new Job();

        $form = $this->createFormBuilder($job)
            ->add('IdEntreprise')
            ->add('NomOffre')
            ->add('Description')
            ->add('Criteres')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $job->setDate(new \DateTime());

            $em = $managerRegistry->getManager();
            $em->persist($job);
            $em->flush();

            return $this->redirectToRoute('offres_emploi');
        };

        return $this->render('app/job.html.twig', [
            'formJob' => $form->createView()
        ]);
    }
}
