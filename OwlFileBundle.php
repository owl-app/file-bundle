<?php

declare(strict_types=1);

namespace Owl\Bundle\FileBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Owl\Bundle\FileBundle\DependencyInjection\Compiler\RegisterFileFactoryPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class OwlFileBundle extends AbstractResourceBundle
{
    public function getSupportedDrivers(): array
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new RegisterFileFactoryPass());
    }

    /**
     * @psalm-suppress MismatchingDocblockReturnType https://github.com/vimeo/psalm/issues/2345
     */
    protected function getModelNamespace(): string
    {
        return 'Owl\Component\File\Model';
    }
}
