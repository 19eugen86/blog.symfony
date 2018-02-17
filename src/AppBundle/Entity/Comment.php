<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="post", type="integer")
     */
    private $post;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="userFrom", type="integer")
     */
    private $userFrom;

    /**
     * @var int
     *
     * @ORM\Column(name="userTo", type="integer", nullable=true)
     */
    private $userTo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="posted_on", type="datetime")
     */
    private $postedOn;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set post
     *
     * @param integer $post
     *
     * @return Comment
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return int
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set userFrom
     *
     * @param integer $userFrom
     *
     * @return Comment
     */
    public function setUserFrom($userFrom)
    {
        $this->userFrom = $userFrom;

        return $this;
    }

    /**
     * Get userFrom
     *
     * @return int
     */
    public function getUserFrom()
    {
        return $this->userFrom;
    }

    /**
     * Set userTo
     *
     * @param integer $userTo
     *
     * @return Comment
     */
    public function setUserTo($userTo)
    {
        $this->userTo = $userTo;

        return $this;
    }

    /**
     * Get userTo
     *
     * @return int
     */
    public function getUserTo()
    {
        return $this->userTo;
    }

    /**
     * Set postedOn
     *
     * @param \DateTime $postedOn
     *
     * @return Comment
     */
    public function setPostedOn($postedOn)
    {
        $this->postedOn = $postedOn;

        return $this;
    }

    /**
     * Get postedOn
     *
     * @return \DateTime
     */
    public function getPostedOn()
    {
        return $this->postedOn;
    }
}

