<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Event;
use Mukadi\Wallet\Core\OperationInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class OperationEvent.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class OperationEvent extends Event 
{
    /**
     * @var OperationInterface
     */
    protected $operation;

    public function __construct(OperationInterface $op) {
        $this->operation = $op;
    }

    /**
     * @return OperationInterface
     */
    public function getOperation()
    {
        return $this->operation;
    }
}
