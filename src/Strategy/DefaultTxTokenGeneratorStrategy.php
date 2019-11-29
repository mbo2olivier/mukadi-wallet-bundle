<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Strategy;
use Mukadi\Wallet\Core\TransactionInterface;
use Mukadi\WalletBundle\Model\Strategy\TxTokenGeneratorStrategy;

/**
 * Class DefaultTxTokenGeneratorStrategy.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class DefaultTxTokenGeneratorStrategy extends TxTokenGeneratorStrategy 
{

    public function generateTokenFor(TransactionInterface $tx)
    {
        $token = hash("sha256",uniqid().$tx->getPlatformId().time());
        $tx->setToken($token);
    }
}
