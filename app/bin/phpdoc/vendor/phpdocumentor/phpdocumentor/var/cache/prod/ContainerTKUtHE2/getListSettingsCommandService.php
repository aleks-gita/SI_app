<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getListSettingsCommandService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the public 'console.command.public_alias.phpDocumentor\Console\Command\Project\ListSettingsCommand' shared autowired service.
     *
     * @return \phpDocumentor\Console\Command\Project\ListSettingsCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Project'.\DIRECTORY_SEPARATOR.'ListSettingsCommand.php';

        return $container->services['console.command.public_alias.phpDocumentor\\Console\\Command\\Project\\ListSettingsCommand'] = new \phpDocumentor\Console\Command\Project\ListSettingsCommand(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['phpDocumentor\\Transformer\\Writer\\Graph'] ?? $container->load('getGraphService'));
            yield 1 => ($container->privates['phpDocumentor\\Transformer\\Writer\\RenderGuide'] ?? $container->load('getRenderGuideService'));
        }, 2));
    }
}
