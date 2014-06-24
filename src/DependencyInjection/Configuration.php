<?php
namespace IvixLabs\SyncDaemonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ivix_labs_sync_daemon');

        $rootNode->children()
            ->arrayNode('sync_daemon_server')
                ->children()
                    ->scalarNode('host')->defaultValue('127.0.0.1')->end()
                    ->scalarNode('port')->defaultValue(1337)->end()
                ->end()
            ->end()
            ->arrayNode('sync_daemon_client')
                ->children()
                    ->scalarNode('host')->defaultValue('127.0.0.1')->end()
                    ->scalarNode('port')->defaultValue(1337)->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
