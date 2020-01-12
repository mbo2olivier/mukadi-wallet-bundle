<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Storage\Doctrine;
/**
 * Class ListingTrait.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
use Doctrine\Persistence\ObjectRepository;

trait ListingTrait  
{
    public function listing(ObjectRepository $repo, array $criteria) {
        if(count($criteria) == 0)
            return $repo->findAll();

        if(isset($criteria['orderBy'])){
            $order  = $criteria['orderBy'];
            unset($criteria['orderBy']);
        }else
            $order = null;
        if(isset($criteria['limit'])){
            $offset = (isset($criteria['limit']['first']))? $criteria['limit']['first']: null;
            $limit = (isset($criteria['limit']['max']))? $criteria['limit']['max']: null;
            unset($criteria['limit']);
        }else{
            $offset = null;
            $limit = null;
        }
        return $repo->findBy($criteria,$order,$limit,$offset);
    }

    public function find(ObjectRepository $repo, array $criteria) {
        return $repo->findOneBy($criteria);
    }
}
