<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mukadi\WalletBundle\Model\WalletType as Base;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WalletTypeRepository")
 */
class WalletType extends Base
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}