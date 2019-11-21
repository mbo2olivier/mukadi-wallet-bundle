<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model;
use Mukadi\Wallet\Core\PlatformInterface;

/**
 * Class Platform.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
abstract class Platform  implements PlatformInterface
{
    /** @var  integer */
    protected $id;
    /** @var  string */
    protected $label;
    /** @var  string */
    protected $platformId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }

    /**
     * @param string $platformId
     */
    public function setPlatformId($platformId)
    {
        $this->platformId = $platformId;
    }
}
