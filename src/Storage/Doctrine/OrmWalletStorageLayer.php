<?php
/**
 * This file is part of the muakdi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Storage\Doctrine;
use Doctrine\Persistence\ObjectManager;
use Mukadi\Wallet\Core\AuthorizationInterface;
use Mukadi\Wallet\Core\Exception\StorageLayerException;
use Mukadi\Wallet\Core\HolderInterface;
use Mukadi\Wallet\Core\OperationInterface;
use Mukadi\Wallet\Core\PlatformInterface;
use Mukadi\Wallet\Core\Storage\WalletStorageLayer;
use Mukadi\Wallet\Core\WalletInterface;

/**
 * Class OrmWalletStorageLayer.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class OrmWalletStorageLayer extends WalletStorageLayer 
{

    use ListingTrait;

    /** @var  ObjectManager */
    protected $manager;
    /** @var  string */
    protected $walletClass;
    /** @var  string */
    protected $opClass;
    /** @var  string */
    protected $holderClass;
    /** @var  string */
    protected $authClass;
    /** @var  string */
    protected $pifClass;

    public function __construct(ObjectManager $om, $walletClass, $opClass, $holderClass, $authClass, $pifClass) {
        $this->manager = $om;
        $this->walletClass = $walletClass;
        $this->opClass = $opClass;
        $this->holderClass = $holderClass;
        $this->authClass = $authClass;
        $this->pifClass = $pifClass;
    }
    /**
     * begin a transaction for a batch database operations
     */
    public function beginTransaction()
    {
        // TODO: Implement beginTransaction() method.
    }

    /**
     * validate database batch operations
     */
    public function commit()
    {
        // TODO: Implement commit() method.
    }

    /**
     * cancel database batch operations
     */
    public function rollback()
    {
        // TODO: Implement rollback() method.
    }

    /**
     * save wallet in the storage layer
     *
     * @param WalletInterface $wallet
     * @return WalletInterface
     * @throws StorageLayerException
     **/
    public function saveWallet(WalletInterface $wallet)
    {
        $this->manager->persist($wallet);
        $this->manager->flush();
        return $wallet;
    }

    /**
     * save operation in the storage layer
     *
     * @param OperationInterface $op
     * @return OperationInterface
     * @throws StorageLayerException
     **/
    public function saveOperation(OperationInterface $op)
    {
        $this->manager->persist($op);
        $this->manager->flush();
        return $op;
    }

    /**
     * save holder in the storage layer
     *
     * @param HolderInterface $holder
     * @return HolderInterface
     * @throws StorageLayerException
     **/
    public function saveHolder(HolderInterface $holder)
    {
        $this->manager->persist($holder);
        $this->manager->flush();
        return $holder;
    }

    /**
     * save authorization in the storage layer
     *
     * @param AuthorizationInterface $auth
     * @return AuthorizationInterface
     * @throws StorageLayerException
     **/
    public function saveAuthorization(AuthorizationInterface $auth)
    {
        $this->manager->persist($auth);
        $this->manager->flush();
        return $auth;
    }

    /**
     * getting wallet by criteria
     *
     * @param array $criteria
     * @return WalletInterface
     * @throws StorageLayerException
     **/
    public function findWalletBy(array $criteria)
    {
        return $this->find($this->manager->getRepository($this->walletClass), $criteria);
    }

    /**
     * getting operation by criteria
     *
     * @param array $criteria
     * @return OperationInterface
     * @throws StorageLayerException
     **/
    public function findOperationBy(array $criteria)
    {
        return $this->find($this->manager->getRepository($this->opClass), $criteria);
    }

    /**
     * getting holder by criteria
     *
     * @param array $criteria
     * @return HolderInterface
     * @throws StorageLayerException
     **/
    public function findHolderBy(array $criteria)
    {
        return $this->find($this->manager->getRepository($this->holderClass), $criteria);
    }

    /**
     * getting authorization by criteria
     *
     * @param array $criteria
     * @return AuthorizationInterface
     * @throws StorageLayerException
     **/
    public function findAuthorizationBy(array $criteria)
    {
        return $this->find($this->manager->getRepository($this->authClass), $criteria);
    }

    /**
     * getting platform by id
     *
     * @param string $id
     * @return PlatformInterface
     * @throws StorageLayerException
     **/
    public function getPlatform($id)
    {
        return $this->find($this->manager->getRepository($this->pifClass), ["platformId" => $id]);
    }

    /**
     * getting operations by criteria
     *
     * @param array $criteria
     * @return OperationInterface[]
     * @throws StorageLayerException
     **/
    public function listOperationBy(array $criteria)
    {
        return $this->listing($this->manager->getRepository($this->opClass), $criteria);
    }
}
