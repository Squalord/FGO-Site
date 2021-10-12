<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\News;

class MNNewsController extends AbstractController
{
    /**
     * La liste de toutes les news, triées par date de publication chronologique inverse
     */
    #[Route('/news', name: 'frontoffice_m_n_news')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository(News::class)->findBy([], ['createdAt' => 'DESC']);

        return $this->render('frontoffice/mn_news/index.html.twig', [
            'news' => $news,
        ]);
    }
    
    /**
     * La liste de toutes les news, filtrées par catégorie, triées par date de publication chronologique inverse
     */
    #[Route('/news/category/{category}', name: 'frontoffice_m_n_news_category')]
    public function category(Category $category): Response
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository(News::class)->findBy(['category' => $category], ['createdAt' => 'DESC']);

        return $this->render('frontoffice/mn_news/category.html.twig', [
            'news' => $news,
            'category' => $category,
        ]);
    }
    
    /**
     * La page d'une news 
     */
    #[Route('/news/views/{news}', name: 'frontoffice_m_n_news_view')]
    public function view(News $news): Response
    {
        return $this->render('frontoffice/mn_news/view.html.twig', [
            'news' => $news,
        ]);
    }
}
