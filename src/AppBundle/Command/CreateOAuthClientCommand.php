<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateOAuthClientCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:oauth-client:create')
            ->setDescription('Create OAuth Client.')
            ->addArgument('redirectUri', InputArgument::REQUIRED, 'The redirect uri')
            ->addArgument('grantType',   InputArgument::REQUIRED, 'The grant type')
            ->setHelp(<<<EOT
The <info>app:oauth:create</info> command creates a OAuth Client:

  <info>php app/console app:oauth:create</info>

This interactive shell will ask you for an client name, a redirect uri and then a grant type.

EOT
            );
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $redirectUri = $input->getArgument('redirectUri');
        $grantType   = $input->getArgument('grantType');

        $clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setRedirectUris([$redirectUri]);
        $client->setAllowedGrantTypes([$grantType]);
        $clientManager->updateClient($client);

        $output->writeln(sprintf('Created OAuth Client'));

        return;
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('redirectUri')) {
            $redirectUri = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose an Redirect Uri:',
                function($redirectUri) {
                    if (empty($redirectUri)) {
                        throw new \Exception('Redirect Uri can not be empty');
                    }

                    return $redirectUri;
                }
            );
            $input->setArgument('redirectUri', $redirectUri);
        }

        if (!$input->getArgument('grantType')) {
            $grantType = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a Grant Type:',
                function($grantType) {
                    if (empty($grantType)) {
                        throw new \Exception('Grant Type can not be empty');
                    }

                    return $grantType;
                }
            );
            $input->setArgument('grantType', $grantType);
        }
    }
}
