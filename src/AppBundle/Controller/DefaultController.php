<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1),
            Post::NUM_ITEMS
        );

        return $this->render('default/index.html.twig', [
            'categories' => $categories,
            'posts' => $pagination,
        ]);
    }

    /**
     * @Route("/category/{id}/posts", name="category_posts", requirements={"id"="\d+"})
     */
    public function filterAction(Request $request, Category $category)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findByCategory($category);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1),
            Post::NUM_ITEMS
        );

        return $this->render('default/index.html.twig', [
            'categories' => $categories,
            'posts' => $pagination
        ]);
    }
}
