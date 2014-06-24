<?php
namespace IvixLabs\SyncDaemonBundle\Command;

use IvixLabs\SyncDaemon\SyncDaemonServer;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncDaemonServerCommand extends ContainerAwareCommand
{
    /**
     * @var SyncDaemonServer
     */
    private $server;

    protected function configure()
    {
        $this->setName('ivixlabs:sync-daemon:server-start');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->server->start();
    }

    public function setServer(SyncDaemonServer $server)
    {
        $this->server = $server;
    }
}