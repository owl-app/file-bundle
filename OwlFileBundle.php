<?php

declare(strict_types=1);

namespace Owl\Bundle\FileBundle;

use Owl\Bundle\FileBundle\DependencyInjection\Compiler\RegisterFileFactoryPass;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class OwlFileBundle extends AbstractResourceBundle
{
    /**
     * @return string[]
     *
     * @psalm-return list{'doctrine/orm'}
     */
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
     *
     * @psalm-return 'Owl\Component\File\Model'
     */
    protected function getModelNamespace(): string
    {
        return 'Owl\Component\File\Model';
    }
}
