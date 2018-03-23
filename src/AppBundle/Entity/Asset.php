<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Asset
 *
 * @ORM\Table(name="asset")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssetRepository")
 *
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="asset", fileNameProperty="assetName", size="assetSize")
     *
     * @var File
     */
    private $assetFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $assetName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $assetSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

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
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $asset
     */
    public function setAssetFile(?File $asset = null)
    {
        $this->assetFile = $asset;

        if (null !== $asset) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return null|File
     */
    public function getAssetFile(): ?File
    {
        return $this->assetFile;
    }

    /**
     * @param null|string $assetName
     */
    public function setAssetName(?string $assetName): void
    {
        $this->assetName = $assetName;
    }

    /**
     * @return null|string
     */
    public function getAssetName(): ?string
    {
        return $this->assetName;
    }

    /**
     * @param int|null $assetSize
     */
    public function setAssetSize(?int $assetSize): void
    {
        $this->assetSize = $assetSize;
    }

    /**
     * @return int|null
     */
    public function getAssetSize(): ?int
    {
        return $this->assetSize;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }
}

