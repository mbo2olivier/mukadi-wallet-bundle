<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\DependencyInjection;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        /*$treeBuilder = new TreeBuilder('mukadi_wallet');
        $root = $treeBuilder->getRootNode();*/
        $treeBuilder = new TreeBuilder();
        $root = $treeBuilder->root('mukadi_wallet');
        $root
            ->children()
                ->arrayNode('manager')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('schema_manager')->cannotBeEmpty()->defaultValue('mukadi_wallet.default_schema_manager')->end()
                        ->scalarNode('transaction_manager')->cannotBeEmpty()->defaultValue('mukadi_wallet.default_tx_manager')->end()
                        ->scalarNode('wallet_manager')->cannotBeEmpty()->defaultValue('mukadi_wallet.default_wallet_manager')->end()
                    ->end()
                ->end()//manager
                ->arrayNode('storage')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('schema_storage')->cannotBeEmpty()->defaultValue('mukadi_wallet.doctrine.schema_storage')->end()
                        ->scalarNode('transaction_storage')->cannotBeEmpty()->defaultValue('mukadi_wallet.doctrine.tx_storage')->end()
                        ->scalarNode('wallet_storage')->cannotBeEmpty()->defaultValue('mukadi_wallet.doctrine.wallet_storage')->end()
                    ->end()
                ->end()//storage
                ->arrayNode('strategy')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('id_generator')->cannotBeEmpty()->defaultValue('mukadi_wallet.strategy.default_id_generator')->end()
                        ->scalarNode('token_generator')->cannotBeEmpty()->defaultValue('mukadi_wallet.strategy.default_tx_token_generator')->end()
                        ->scalarNode('wallet_naming')->cannotBeEmpty()->defaultValue('mukadi_wallet.strategy.default_wallet_naming')->end()
                    ->end()
                ->end()//strategy
                ->arrayNode('classes')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('authorization')->cannotBeEmpty()->defaultValue('App\Entity\Authorization')->end()
                        ->scalarNode('channel')->cannotBeEmpty()->defaultValue('App\Entity\Channel')->end()
                        ->scalarNode('counter')->cannotBeEmpty()->defaultValue('App\Entity\Counter')->end()
                        ->scalarNode('holder')->cannotBeEmpty()->defaultValue('App\Entity\Holder')->end()
                        ->scalarNode('holder_profil')->cannotBeEmpty()->defaultValue('App\Entity\HolderProfil')->end()
                        ->scalarNode('instruction')->cannotBeEmpty()->defaultValue('App\Entity\Instruction')->end()
                        ->scalarNode('operation')->cannotBeEmpty()->defaultValue('App\Entity\Operation')->end()
                        ->scalarNode('platform')->cannotBeEmpty()->defaultValue('App\Entity\Platform')->end()
                        ->scalarNode('request_type')->cannotBeEmpty()->defaultValue('App\Entity\RequestType')->end()
                        ->scalarNode('schema')->cannotBeEmpty()->defaultValue('App\Entity\Schema')->end()
                        ->scalarNode('transaction')->cannotBeEmpty()->defaultValue('App\Entity\Transaction')->end()
                        ->scalarNode('transaction_history')->cannotBeEmpty()->defaultValue('App\Entity\TransactionHistory')->end()
                        ->scalarNode('wallet')->cannotBeEmpty()->defaultValue('App\Entity\Wallet')->end()
                        ->scalarNode('wallet_type')->cannotBeEmpty()->defaultValue('App\Entity\WalletType')->end()
                    ->end()
                ->end()//classes
            ->end()
        ;

        return $treeBuilder;
    }
}
