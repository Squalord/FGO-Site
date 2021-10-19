<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Challengequest;

class MNChallengequestController extends AbstractController
{
    /**
     * La liste de toutes les vidéos challengeQuest, triées par date de publication chronologique inverse
     */
    #[Route('/challengeQuest', name: 'frontoffice_m_n_challengequest')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $challengequest = $em->getRepository(Challengequest::class)->findBy([], ['createdAt' => 'DESC']);

        return $this->render('frontoffice/mn_challengequest/index.html.twig', [
            'challengequests' => $challengequest,
        ]);
    }

    /**
     * La page d'un challengeQuest
     */
    #[Route('/challengeQuest/views/{challengequest}', name: 'frontoffice_m_n_challengequest_view')]
    public function view(Challengequest $challengequest): Response
    {
        return $this->render('frontoffice/mn_challengequest/view.html.twig', [
            'challengequest' => $challengequest,
        ]);
    }

}
