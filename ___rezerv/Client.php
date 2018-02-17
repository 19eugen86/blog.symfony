<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17.02.2018
 * Time: 16:50
 */

namespace AppBundle\Entity;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy"AUTO")
     */
    protected $id;
}