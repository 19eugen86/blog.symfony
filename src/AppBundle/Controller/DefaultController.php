<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        return $this->render('default/index.html.twig', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/category/{id}/posts", name="category_posts", requirements={"id"="\d+"})
     */
    public function filterAction(Category $category)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findByCategory($category);

        return $this->render('default/index.html.twig', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
