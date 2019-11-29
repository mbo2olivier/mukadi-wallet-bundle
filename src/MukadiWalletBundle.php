<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MukadiWalletBundle.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class MukadiWalletBundle extends Bundle 
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $this->addRegisterMappingPass($container);
    }

    /**
     * @param ContainerBuilder $containerBuilder
     */
    public function addRegisterMappingPass(ContainerBuilder $containerBuilder)
    {
        $mappings = [
            realpath(__DIR__.'/Resources/config/doctrine-model') => 'Mukadi\WalletBundle\Model',
        ];

        $containerBuilder->addCompilerPass(DoctrineOrmMappingsPass::createYamlMappingDriver($mappings));
    }
}
