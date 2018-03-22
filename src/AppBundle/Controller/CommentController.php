<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Post;
use AppBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller.
 */
class CommentController extends Controller
{
    /**
     * Lists all comment entities.
     *
     * @Route("blog/{id}/comments", name="comment_index", requirements={"id"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request, Post $post)
    {
        $comments = $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findByPost($post);

        $comment = new Comment();
        $comment->setPost($post);
        $comment->setUser($this->getUser());
        $comment->setPostedOn(new \DateTime());

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('comment_index', [
                'id' => $post->getId()
            ]);
        }

        return $this->render('comment/index.html.twig', [
            'post' => $post,
            'comments' => $comments,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Deletes a comment entity.
     *
     * @Route("blog/{post}/comments/{id}/delete", name="comment_delete")
     * @Method("GET")
     */
    public function deleteAction(Comment $comment, $post)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($comment);
        $em->flush();

        return $this->redirectToRoute('comment_index', [
            'id' => $post
        ]);
    }
}
