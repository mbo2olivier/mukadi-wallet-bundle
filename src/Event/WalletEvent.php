<?php
/**
 * This file is part of the mukadi\wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Event;
use Mukadi\Wallet\Core\WalletInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class WalletEvent.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class WalletEvent extends Event 
{
    /**
     * @var WalletInterface
     */
    protected $wallet;

    public function __construct(WalletInterface $wallet) {
        $this->wallet = $wallet;
    }

    /**
     * @return WalletInterface
     */
    public function getWallet()
    {
        return $this->wallet;
    }
}
