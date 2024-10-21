<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormRedirectController extends AbstractController
{
    #[Route('/redirect', name: 'redirect')]
    public function formRedirect(): Response
    {
        return $this->render('form_redirect.html.twig', []);
    }
}