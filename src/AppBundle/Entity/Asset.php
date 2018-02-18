<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Asset
 *
 * @ORM\Table(name="asset")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssetRepository")
 */
class Asset
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
     * @var string
     *
     * @ORM\Column(name="asset", type="string", length=255)
     */
    private $asset;

    /**
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="assets")
     */
    private $posts;

    /**
     * Asset constructor.
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

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
     * Set asset
     *
     * @param string $asset
     *
     * @return Asset
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;

        return $this;
    }

    /**
     * Get asset
     *
     * @return string
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }
}

