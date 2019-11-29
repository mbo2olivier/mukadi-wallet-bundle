<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Strategy;
use Doctrine\Common\Persistence\ObjectManager;
use Mukadi\WalletBundle\Model\Strategy\IdGeneratorStrategy;

/**
 * Class DefaultIdGeneratorStrategy.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class DefaultIdGeneratorStrategy extends IdGeneratorStrategy 
{
    const COUNT_LIMIT = 1000;
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager, $counterClass) {
        parent::__construct($counterClass);
        $this->manager = $manager;
    }

    /**
     * @param $prefix
     * @param array $options
     * @return string
     */
    public function generateIdFor($prefix, $options = [])
    {
        $count = $this->nextValueFor($prefix,$options);
        $r = str_pad($count, 4, "0", STR_PAD_LEFT);
        return $prefix.(new \DateTime('now'))->format('ymdHi').$r;
    }

    /**
     * @param $prefix
     * @param array $options
     * @return integer
     */
    public function nextValueFor($prefix, $options = [])
    {
        $prefix = substr($prefix, 0,2);
        /** @var \Mukadi\WalletBundle\Model\Counter $c */
        $c = $this->manager->getRepository($this->counterClass)->findOneBy(["ref" => $prefix]);

        if($c !== null) {
            $class = $this->counterClass;
            /** @var \Mukadi\WalletBundle\Model\Counter $c */
            $c = new $class();
            $c->setRef($prefix);
            $c->setCounter(0);
        }

        $count = $c->getCounter() + 1;
        $c->setCounter($count >= self::COUNT_LIMIT ? 1 : $count);

        $this->manager->persist($c);
        $this->manager->flush();

        return $c->getCounter();
    }
}
