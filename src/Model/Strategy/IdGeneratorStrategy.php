<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model\Strategy;
/**
 * Class IdGeneratorStrategy.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
abstract class IdGeneratorStrategy  
{
    /**
     * @var string
     */
    protected $counterClass;

    public function __construct($counterClass) {
        $this->counterClass = $counterClass;
    }

    /**
     * @param $prefix
     * @param array $options
     * @return string
     */
    abstract public function generateIdFor($prefix, $options = []);

    /**
     * @param $prefix
     * @param array $options
     * @return integer
     */
    abstract public function nextValueFor($prefix, $options = []);
}
