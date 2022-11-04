<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Profile;
use App\Entity\Job;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;

class AppController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */

    public function home()
    {
        return $this->render('app/home.html.twig');
    }

    /**
     * @Route("/recrut", name = "recruteur")
     */

    public function recrut()
    {
        return $this->render('app/recrut.html.twig');
    }

    /**
     * @Route("/create/profil", name = "create_profil")
     */

    public function createProfile(Request $request, ManagerRegistry $managerRegistry)
    {
        $profile = new Profile();

        $form = $this->createFormBuilder($profile)
            ->add('name_profile')
            ->add('surname_profile')
            ->add('age')
            ->add('career')
            ->add(
                'skill_profile',
                ChoiceType::class,
                [
                    'choices' => [
                        'Html' => "HTML",
                        'Css' => "CSS",
                        'Javascript' => "Javascript",
                        'ReactJs' => "ReactJS",
                        'Flutter' => "Flutter",
                        'Symfony' => "Symfony",
                        'Laravel' => "Laravel",
                        'SwiftUi' => "SwiftUI",
                        'Php' => "PHP",
                    ]
                ]
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $managerRegistry->getManager();
            $em->persist($profile);
            $em->flush();

            return $this->redirectToRoute('profile');
        };

        return $this->render('app/profil.html.twig', [
            'formProfile' => $form->createView()
        ]);
    }

    /**
     * @Route("/company/create", name = "create_company")
     */

    public function createCompany(Request $request, ManagerRegistry $managerRegistry)
    {
        $company = new Entreprise();

        $form = $this->createFormBuilder($company)
            ->add('nomEntreprise')
            ->add('secteur')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $managerRegistry->getManager();
            $em->persist($company);
            $em->flush();

            return $this->redirectToRoute('recruteur');
        };

        return $this->render('app/company.html.twig', [
            'formCompany' => $form->createView()
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
