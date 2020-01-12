<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Event;
use Mukadi\Wallet\Core\TransactionInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class TransactionEvent.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class TransactionEvent extends Event 
{
    /**
     * @var TransactionInterface
     */
    protected $transaction;

    public function __construct(TransactionInterface $tx) {
        $this->transaction = $tx;
    }

    /**
     * @return TransactionInterface
     */
    public function getTransaction()
    {
        return $this->transaction;
    }
}
