<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\DependencyInjection;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class MukadiWalletExtension.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class MukadiWalletExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('manager.yml');
        $loader->load('storage.yml');
        $loader->load('strategy.yml');

        $this->setupManagers($config["manager"], $container);
        $this->setupStorage($config["storage"], $container);
        $this->setupStrategy($config["strategy"], $container);
        $this->setupClasses($config["classes"], $container);
    }

    private function setupManagers(array $config, ContainerBuilder $container) {
        $container->setAlias("mukadi_wallet.schema_manager", $config["schema_manager"]);
        $container->setAlias("mukadi_wallet.wallet_manager", $config["wallet_manager"]);
    }

    private function setupStorage(array $config, ContainerBuilder $container) {
        $container->setAlias("mukadi_wallet.schema_storage", $config["schema_storage"]);
        $container->setAlias("mukadi_wallet.wallet_storage", $config["wallet_storage"]);
    }

    private function setupStrategy(array $config, ContainerBuilder $container) {
        $container->setAlias("mukadi_wallet.strategy.id_generator", $config["id_generator"]);
        $container->setAlias("mukadi_wallet.strategy.wallet_naming", $config["wallet_naming"]);
    }

    private function setupClasses(array $config, ContainerBuilder $container) {
        $container->setParameter("mukadi_wallet_auth_class",$config["authorization"]);
        $container->setParameter("mukadi_wallet_channel_class",$config["channel"]);
        $container->setParameter("mukadi_wallet_counter_class",$config["counter"]);
        $container->setParameter("mukadi_wallet_holder_class",$config["holder"]);
        $container->setParameter("mukadi_wallet_holder_profil_class",$config["holder_profil"]);
        $container->setParameter("mukadi_wallet_instruction_class",$config["instruction"]);
        $container->setParameter("mukadi_wallet_operation_class",$config["operation"]);
        $container->setParameter("mukadi_wallet_platform_class",$config["platform"]);
        $container->setParameter("mukadi_wallet_request_type_class",$config["request_type"]);
        $container->setParameter("mukadi_wallet_schema_class",$config["schema"]);
        $container->setParameter("mukadi_wallet_wallet_class",$config["wallet"]);
        $container->setParameter("mukadi_wallet_wallet_type_class",$config["wallet_type"]);
    }
}
