<?php

namespace Acqmatch\Bundle\CoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sync_daemon_bundle');

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
