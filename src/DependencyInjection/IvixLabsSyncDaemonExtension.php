<?php
namespace IvixLabs\SyncDaemonBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;


class IvixLabsSyncDaemonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        $container->setParameter('ivixlabs.sync_daemon_bundle.sync_daemon_server.host', $config['sync_daemon_server']['host']);
        $container->setParameter('ivixlabs.sync_daemon_bundle.sync_daemon_server.port', $config['sync_daemon_server']['port']);
        $container->setParameter('ivixlabs.sync_daemon_bundle.sync_daemon_client.host', $config['sync_daemon_client']['host']);
        $container->setParameter('ivixlabs.sync_daemon_bundle.sync_daemon_client.port', $config['sync_daemon_client']['port']);


        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }
}
