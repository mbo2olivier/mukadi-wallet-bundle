<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model\Strategy;
use Mukadi\Wallet\Core\WalletInterface;

/**
 * Class WalletNamingStrategy.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
abstract class WalletNamingStrategy
{
    abstract public function GenerateNameFor(WalletInterface $wallet);
}
