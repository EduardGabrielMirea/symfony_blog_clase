<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostController extends AbstractController
{
    #[Route('/blog/new', name: 'new_post')]
    public function newPost(SluggerInterface $slugger,Request $request,EntityManagerInterface $entityManager): Response
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post = $form->getData();

            $post->setPostUser($this->getUser());
            $post->setSlug($slugger->slug($post->getTitle()));
            $post->setNumLike(0);
            $post->setNumComments(0);

            $entityManager->persist($post);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->render('post/images.html.twig', array(
                'form' => $form->createView()
            ));
        }


        return $this->render('post/images.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
