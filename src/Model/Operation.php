<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model;
use Mukadi\Wallet\Core\OperationInterface;

/**
 * Class Operation.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
abstract class Operation  implements OperationInterface
{
    /** @var  double */
    protected $amount;
    /** @var  string */
    protected $authorizationId;
    /** @var  double */
    protected $balance;
    /** @var  string */
    protected $currency;
    /** @var  \DateTime */
    protected $date;
    /** @var  \DateTime */
    protected $executedAt;
    /** @var  string */
    protected $label;
    /** @var  string */
    protected $maker;
    /** @var string */
    protected $operationId;
    /** @var  string */
    protected $platformId;
    /** @var string */
    protected $reversedFrom;
    /** @var  string */
    protected $status;
    /** @var  string */
    protected $type;
    /** @var  \DateTime */
    protected $validatedAt;
    /** @var  string */
    protected $validator;
    /** @var  string */
    protected $walletId;
    /** @var  boolean */
    protected $reversal;

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getAuthorizationId()
    {
        return $this->authorizationId;
    }

    /**
     * @param string $authorizationId
     */
    public function setAuthorizationId($authorizationId)
    {
        $this->authorizationId = $authorizationId;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getExecutedAt()
    {
        return $this->executedAt;
    }

    /**
     * @param \DateTime $executedAt
     */
    public function setExecutedAt($executedAt)
    {
        $this->executedAt = $executedAt;
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
    public function getMaker()
    {
        return $this->maker;
    }

    /**
     * @param string $maker
     */
    public function setMaker($maker)
    {
        $this->maker = $maker;
    }

    /**
     * @return string
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @param string $operationId
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
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

    /**
     * @return boolean
     */
    public function isReversal()
    {
        return $this->reversal;
    }

    /**
     * @param boolean $reversal
     */
    public function setReversal($reversal)
    {
        $this->reversal = $reversal;
    }

    /**
     * @return string
     */
    public function getReversedFrom()
    {
        return $this->reversedFrom;
    }

    /**
     * @param string $reversedFrom
     */
    public function setReversedFrom($reversedFrom)
    {
        $this->reversedFrom = $reversedFrom;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return \DateTime
     */
    public function getValidatedAt()
    {
        return $this->validatedAt;
    }

    /**
     * @param \DateTime $validatedAt
     */
    public function setValidatedAt($validatedAt)
    {
        $this->validatedAt = $validatedAt;
    }

    /**
     * @return string
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param string $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return string
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param string $walletId
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;
    }


}
