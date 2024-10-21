<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        return $this->render('blog.html.twig', []);
    }

    #[Route('/blog/post', name: 'post')]
    public function post(): Response
    {
        return $this->render('single_post.html.twig', []);
    }
}
