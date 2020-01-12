<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model;
/**
 * Class Counter.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class Counter  
{
    /** @var string $ref  */
    protected $ref;

    /** @var integer $counter  */
    protected $counter;

    /**
     * @return integer
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param integer $counter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
    }

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }
}
