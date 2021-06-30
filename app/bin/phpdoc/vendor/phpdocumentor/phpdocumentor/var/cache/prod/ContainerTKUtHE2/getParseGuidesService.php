<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getParseGuidesService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Pipeline\Stage\Parser\ParseGuides' shared autowired service.
     *
     * @return \phpDocumentor\Pipeline\Stage\Parser\ParseGuides
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Pipeline'.\DIRECTORY_SEPARATOR.'Stage'.\DIRECTORY_SEPARATOR.'Parser'.\DIRECTORY_SEPARATOR.'ParseGuides.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Guides'.\DIRECTORY_SEPARATOR.'Formats'.\DIRECTORY_SEPARATOR.'Format.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Guides'.\DIRECTORY_SEPARATOR.'RestructuredText'.\DIRECTORY_SEPARATOR.'Formats'.\DIRECTORY_SEPARATOR.'Format.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Guides'.\DIRECTORY_SEPARATOR.'RestructuredText'.\DIRECTORY_SEPARATOR.'HTML'.\DIRECTORY_SEPARATOR.'HTMLFormat.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Guides'.\DIRECTORY_SEPARATOR.'RestructuredText'.\DIRECTORY_SEPARATOR.'LaTeX'.\DIRECTORY_SEPARATOR.'LaTeXFormat.php';

        return $container->privates['phpDocumentor\\Pipeline\\Stage\\Parser\\ParseGuides'] = new \phpDocumentor\Pipeline\Stage\Parser\ParseGuides(($container->services['tactician.commandbus.default'] ?? $container->load('getTactician_Commandbus_DefaultService')), ($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService')), ($container->privates['phpDocumentor\\Parser\\FlySystemFactory'] ?? $container->load('getFlySystemFactoryService')), [0 => new \phpDocumentor\Guides\RestructuredText\HTML\HTMLFormat(), 1 => new \phpDocumentor\Guides\RestructuredText\LaTeX\LaTeXFormat()]);
    }
}
