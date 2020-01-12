<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model;
use Mukadi\Wallet\Core\InstructionInterface;

/**
 * Class Instruction.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
abstract class Instruction  implements InstructionInterface
{
    /** @var  string */
    protected $amount;
    /** @var  string */
    protected $currency;
    /** @var  string */
    protected $direction;
    /** @var  string */
    protected $label;
    /** @var  integer */
    protected $order;
    /** @var  string */
    protected $schemaId;
    /** @var  string */
    protected $wallet;

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
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
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getSchemaId()
    {
        return $this->schemaId;
    }

    /**
     * @param string $schemaId
     */
    public function setSchemaId($schemaId)
    {
        $this->schemaId = $schemaId;
    }

    /**
     * @return string
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @param string $wallet
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;
    }


}
