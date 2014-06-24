<?php
namespace IvixLabs\Bundle\SyncDaemonBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use IvixLabs\SyncDaemon\Lock;
use IvixLabs\SyncDaemon\SyncDaemonClient;

class IvixLabsSyncDaemonBundle extends Bundle
{

    private static $initSyncDaemon = false;

    public function boot()
    {
        if (!self::$initSyncDaemon) {
            /** @var SyncDaemonClient $client */
            $client = $this->container->get('ivixlabs.sync_daemon_bundle.sync_daemon_client');
            Lock::setSycDaemonClient($client);
            self::$initSyncDaemon = true;
        }
    }
}
