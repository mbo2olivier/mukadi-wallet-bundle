<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Storage\Doctrine;
use Doctrine\Common\Persistence\ObjectManager;
use Mukadi\Wallet\Core\Exception\StorageLayerException;
use Mukadi\Wallet\Core\Storage\TransactionStorageLayer;
use Mukadi\Wallet\Core\TransactionHistoryInterface;
use Mukadi\Wallet\Core\TransactionInterface;

/**
 * Class OrmTransactionStorageLayer.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class OrmTransactionStorageLayer extends TransactionStorageLayer
{
    use ListingTrait;

    /** @var  ObjectManager */
    protected $manager;
    /** @var  string */
    protected $class;

    public function __construct(ObjectManager $om, $class) {
        $this->manager = $om;
        $this->class = $class;
    }
    /**
     * save transaction in the storage layer
     *
     * @param TransactionInterface $tx
     * @return TransactionInterface
     * @throws StorageLayerException
     **/
    public function saveTransaction(TransactionInterface $tx)
    {
        $this->manager->persist($tx);
        $this->manager->flush();
        return $tx;
    }

    /**
     * save transaction in the storage layer
     *
     * @param TransactionHistoryInterface $h
     * @return TransactionHistoryInterface
     * @throws StorageLayerException
     **/
    public function saveHistory(TransactionHistoryInterface $h)
    {
        $this->manager->persist($h);
        $this->manager->flush();
        return $h;
    }

    /**
     * getting wallet by criteria
     *
     * @param array $criteria
     * @return TransactionInterface
     * @throws StorageLayerException
     **/
    public function findTransactionBy(array $criteria)
    {
        return $this->listing($this->manager->getRepository($this->class), $criteria);
    }
}
