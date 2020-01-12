<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Manager;
use Mukadi\Wallet\Core\Manager\AbstractTransactionManager;
use Mukadi\Wallet\Core\Manager\AbstractWalletManager;
use Mukadi\Wallet\Core\Storage\TransactionStorageLayer;
use Mukadi\Wallet\Core\TransactionInterface;
use Mukadi\WalletBundle\Event\TransactionEvent;
use Mukadi\WalletBundle\Model\Strategy\IdGeneratorStrategy;
use Mukadi\WalletBundle\Model\Strategy\TxTokenGeneratorStrategy;
use Mukadi\WalletBundle\MukadiWalletEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class TransactionManager.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class TransactionManager extends AbstractTransactionManager 
{
    /**
     * @var IdGeneratorStrategy
     */
    protected $idGenerator;
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;
    /**
     * @var TxTokenGeneratorStrategy
     */
    private $txTokenGeneratorStrategy;

    public function __construct(TxTokenGeneratorStrategy $txTokenGeneratorStrategy,IdGeneratorStrategy $idGeneratorStrategy, EventDispatcherInterface $dispatcherInterface, TransactionStorageLayer $storage, $historyClass) {
        parent::__construct($storage, $historyClass);
        $this->idGenerator = $idGeneratorStrategy;
        $this->dispatcher = $dispatcherInterface;
        $this->txTokenGeneratorStrategy = $txTokenGeneratorStrategy;
    }
    /**
     * @param TransactionInterface $tx
     * @return TransactionInterface
     */
    public function beforeClose(TransactionInterface $tx)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::TX_BEFORE_CLOSE, new TransactionEvent($tx));
        return $tx;
    }

    /**
     * @param TransactionInterface $tx
     * @return TransactionInterface
     */
    public function afterClose(TransactionInterface $tx)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::TX_AFTER_CLOSE, new TransactionEvent($tx));
        return $tx;
    }

    /**
     * @param TransactionInterface $tx
     * @return TransactionInterface
     */
    public function beforeOpen(TransactionInterface $tx)
    {
        $this->txTokenGeneratorStrategy->generateTokenFor($tx);
        $this->dispatcher->dispatch(MukadiWalletEvents::TX_BEFORE_OPEN, new TransactionEvent($tx));
        return $tx;
    }

    /**
     * @param TransactionInterface $tx
     * @return TransactionInterface
     */
    public function afterOpen(TransactionInterface $tx)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::TX_AFTER_OPEN, new TransactionEvent($tx));
        return $tx;
    }

    /**
     * @param TransactionInterface $tx
     * @return string
     */
    public function generateIdFor(TransactionInterface $tx)
    {
        return $this->idGenerator->generateIdFor("TX");
    }
}
