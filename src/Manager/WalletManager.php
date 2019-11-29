<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Manager;
use Mukadi\Wallet\Core\AuthorizationInterface;
use Mukadi\Wallet\Core\Codes;
use Mukadi\Wallet\Core\Exception\OperationException;
use Mukadi\Wallet\Core\Exception\WalletException;
use Mukadi\Wallet\Core\Manager\AbstractSchemaManager;
use Mukadi\Wallet\Core\Manager\AbstractWalletManager;
use Mukadi\Wallet\Core\OperationInterface;
use Mukadi\Wallet\Core\Storage\WalletStorageLayer;
use Mukadi\Wallet\Core\WalletInterface;
use Mukadi\WalletBundle\Event\AuthorizationEvent;
use Mukadi\WalletBundle\Event\OperationEvent;
use Mukadi\WalletBundle\Event\WalletEvent;
use Mukadi\WalletBundle\Model\Strategy\IdGeneratorStrategy;
use Mukadi\WalletBundle\MukadiWalletEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class WalletManager.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class WalletManager extends AbstractWalletManager 
{
    /**
     * @var IdGeneratorStrategy
     */
    protected $idGenerator;
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher,IdGeneratorStrategy $idGeneratorStrategy, AbstractSchemaManager $schema,WalletStorageLayer $storage, $authClass, $opClass) {
        parent::__construct($schema, $storage, $authClass, $opClass);
        $this->idGenerator = $idGeneratorStrategy;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param OperationInterface $op
     * @return OperationInterface
     * @throws OperationException
     */
    public function beforeExecuteOperation(OperationInterface $op)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::OPERATION_BEFORE_EXEC, new OperationEvent($op));
        return $op;
    }

    /**
     * @param OperationInterface $op
     * @return OperationInterface
     */
    public function afterExecuteOperation(OperationInterface $op)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::OPERATION_AFTER_EXEC, new OperationEvent($op));
        return $op;
    }

    /**
     * @param WalletInterface $wallet
     * @return WalletInterface
     * @throws WalletException
     */
    public function beforeOpenWallet(WalletInterface $wallet)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::WALLET_BEFORE_OPEN, new WalletEvent($wallet));
        return $wallet;
    }

    /**
     * @param WalletInterface $wallet
     * @return WalletInterface
     */
    public function afterOpenWallet(WalletInterface $wallet)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::WALLET_AFTER_OPEN, new WalletEvent($wallet));
        return $wallet;
    }

    /**
     * @param WalletInterface $wallet
     * @return WalletInterface
     * @throws WalletException
     */
    public function beforeCloseWallet(WalletInterface $wallet)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::WALLET_BEFORE_CLOSE, new WalletEvent($wallet));
        return $wallet;
    }

    /**
     * @param WalletInterface $wallet
     * @return WalletInterface
     */
    public function afterCloseWallet(WalletInterface $wallet)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::WALLET_AFTER_CLOSE, new WalletEvent($wallet));
        return $wallet;
    }

    /**
     * Generate an identifier for the given operation
     *
     * @param OperationInterface $op
     * @return string
     */
    public function generateOperationIdFor(OperationInterface $op)
    {
        $prefix = $op->getType() === Codes::OPERATION_TYPE_CASH_IN ? "MC" : "MD";
        return $this->idGenerator->generateIdFor($prefix);
    }

    /**
     * generate a new free authorization identifier
     *
     * @return string
     */
    public function getNextAuthorizationId()
    {
        return $this->idGenerator->generateIdFor("AU");
    }

    /**
     * @param WalletInterface $wallet
     * @return string
     */
    public function generateWalletIdFor(WalletInterface $wallet)
    {
        return $this->idGenerator->generateIdFor("WN");
    }

    /**
     * @param AuthorizationInterface $auth
     * @return AuthorizationInterface
     */
    public function beforeAuthorizationRedemption(AuthorizationInterface $auth)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::AUTH_BEFORE_REDEMPTION, new AuthorizationEvent($auth));
        return $auth;
    }

    /**
     * @param AuthorizationInterface $auth
     * @return AuthorizationInterface
     */
    public function afterAuthorizationRedemption(AuthorizationInterface $auth)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::AUTH_AFTER_REDEMPTION, new AuthorizationEvent($auth));
        return $auth;
    }

    /**
     * @param AuthorizationInterface $auth
     * @return AuthorizationInterface
     */
    public function beforeAuthorizationReversal(AuthorizationInterface $auth)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::AUTH_BEFORE_REVERSAL, new AuthorizationEvent($auth));
        return $auth;
    }

    /**
     * @param AuthorizationInterface $auth
     * @return AuthorizationInterface
     */
    public function afterAuthorizationReversal(AuthorizationInterface $auth)
    {
        $this->dispatcher->dispatch(MukadiWalletEvents::AUTH_AFTER_REVERSAL, new AuthorizationEvent($auth));
        return $auth;
    }
}
