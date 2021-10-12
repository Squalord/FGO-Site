<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
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
     * @Route("/Contact")
     */
    public function contact(): Response 
    {
        return new Response('Contact page');
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
     * @Route("/News")
     */
    public function news(): Response 
    {
        return new Response('News page');
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
