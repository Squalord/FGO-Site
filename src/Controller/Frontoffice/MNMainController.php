<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MNMainController extends AbstractController
{
    /**
    * @Route("/",name = "Home")
    */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
    * @Route("/user/index",name = "user/index")
    */
    public function indexUser(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function questions($slug): Response 
    {
        return new Response( sprintf(
            'Rate up is a lie !',
            $slug
        ));
    }

    /**
     * @Route("/FunnyStuff")
     */
    public function funnyStuff(): Response 
    {
        return new Response('FunnyStuff page');
    }

    /**
     * @Route("/Legend")
     */
    public function legend(): Response 
    {
        return new Response('Legend page');
    }

    /**
     * @Route("/PlayOfTheWeek")
     */
    public function potw(): Response 
    {
        return new Response('Play  The Week page');
    }

    /**
     * @Route("/WorldRecord")
     */
    public function wr(): Response 
    {
        return new Response('World Record page');
    }    
}
