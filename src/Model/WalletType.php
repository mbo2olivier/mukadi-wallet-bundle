<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model;
use Mukadi\Wallet\Core\WalletTypeInterface;

/**
 * Class WalletType.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
abstract class WalletType  implements WalletTypeInterface
{
    /** @var  integer */
    protected $id;
    /** @var  string */
    protected $code;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
