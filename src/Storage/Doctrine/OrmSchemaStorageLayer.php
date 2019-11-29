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
use Mukadi\Wallet\Core\InstructionInterface;
use Mukadi\Wallet\Core\Storage\SchemaStorageLayer;

/**
 * Class OrmSchemaStorageLayer.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class OrmSchemaStorageLayer extends SchemaStorageLayer
{
    /** @var  ObjectManager */
    protected $manager;
    /** @var  string */
    protected $class;

    public function __construct(ObjectManager $om, $class) {
        $this->manager = $om;
        $this->class = $class;
    }
    /**
     * @param string $code ;
     * @return InstructionInterface[]
     */
    public function getInstructions($code)
    {
        $repo =  $this->manager->getRepository($this->class);
        return $repo->findBy(["schemaId" => $code],["order" => "asc"]);
    }
}
