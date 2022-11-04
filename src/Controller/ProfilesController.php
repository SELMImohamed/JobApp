<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Profile;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class ProfilesController extends AbstractController
{
    /**
     * @Route("/profile/display", name = "profile")
     */

    public function profileDisplay(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Profile::class)->findAll();

        return $this->render('app/profilepage.html.twig', [
            'profil' => $repository
        ]);
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
}
