<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Strategy;
use Mukadi\Wallet\Core\WalletInterface;
use Mukadi\WalletBundle\Model\Strategy\IdGeneratorStrategy;
use Mukadi\WalletBundle\Model\Strategy\WalletNamingStrategy;

/**
 * Class DefaultWalletNamingStrategy.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class DefaultWalletNamingStrategy extends WalletNamingStrategy 
{
    /**
     * @var IdGeneratorStrategy
     */
    protected $idGenerator;

    public function __construct(IdGeneratorStrategy $idGeneratorStrategy) {
        $this->idGenerator = $idGeneratorStrategy;
    }

    public function generateNameFor(WalletInterface $wallet)
    {
        $name = $wallet->getWalletType();
        $name .= (new \DateTime('now'))->format('y');
        $name .= $this->idGenerator->nextValueFor("WI");
        $wallet->setName($name);
    }
}
