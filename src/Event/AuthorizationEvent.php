<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Event;
use Mukadi\Wallet\Core\AuthorizationInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class AuthorizationEvent.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class AuthorizationEvent extends Event 
{
    /**
     * @var AuthorizationInterface
     */
    protected $authorization;

    public function __construct(AuthorizationInterface $auth) {
        $this->authorization = $auth;
    }

    /**
     * @return AuthorizationInterface
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }
}
