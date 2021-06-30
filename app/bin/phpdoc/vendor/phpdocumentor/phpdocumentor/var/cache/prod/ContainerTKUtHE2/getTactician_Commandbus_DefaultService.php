<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTactician_Commandbus_DefaultService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the public 'tactician.commandbus.default' shared service.
     *
     * @return \League\Tactician\CommandBus
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'CommandBus.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Middleware.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Handler'.\DIRECTORY_SEPARATOR.'CommandHandlerMiddleware.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Handler'.\DIRECTORY_SEPARATOR.'CommandNameExtractor'.\DIRECTORY_SEPARATOR.'CommandNameExtractor.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Handler'.\DIRECTORY_SEPARATOR.'CommandNameExtractor'.\DIRECTORY_SEPARATOR.'ClassNameExtractor.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Handler'.\DIRECTORY_SEPARATOR.'Locator'.\DIRECTORY_SEPARATOR.'HandlerLocator.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician-container'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'ContainerLocator.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Handler'.\DIRECTORY_SEPARATOR.'MethodNameInflector'.\DIRECTORY_SEPARATOR.'MethodNameInflector.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'tactician'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Handler'.\DIRECTORY_SEPARATOR.'MethodNameInflector'.\DIRECTORY_SEPARATOR.'HandleInflector.php';

        return $container->services['tactician.commandbus.default'] = new \League\Tactician\CommandBus([0 => new \League\Tactician\Handler\CommandHandlerMiddleware(new \League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor(), new \League\Tactician\Container\ContainerLocator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'phpDocumentor\\Guides\\Handlers\\LoadCacheHandler' => ['privates', 'phpDocumentor\\Guides\\Handlers\\LoadCacheHandler', 'getLoadCacheHandlerService', true],
            'phpDocumentor\\Guides\\Handlers\\PersistCacheHandler' => ['privates', 'phpDocumentor\\Guides\\Handlers\\PersistCacheHandler', 'getPersistCacheHandlerService', true],
            'phpDocumentor\\Guides\\Handlers\\RenderHandler' => ['privates', 'phpDocumentor\\Guides\\Handlers\\RenderHandler', 'getRenderHandlerService', true],
            'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseDirectoryHandler' => ['privates', 'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseDirectoryHandler', 'getParseDirectoryHandlerService', true],
            'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseFileHandler' => ['privates', 'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseFileHandler', 'getParseFileHandlerService', true],
        ], [
            'phpDocumentor\\Guides\\Handlers\\LoadCacheHandler' => '?',
            'phpDocumentor\\Guides\\Handlers\\PersistCacheHandler' => '?',
            'phpDocumentor\\Guides\\Handlers\\RenderHandler' => '?',
            'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseDirectoryHandler' => '?',
            'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseFileHandler' => '?',
        ]), ['phpDocumentor\\Guides\\LoadCacheCommand' => 'phpDocumentor\\Guides\\Handlers\\LoadCacheHandler', 'phpDocumentor\\Guides\\PersistCacheCommand' => 'phpDocumentor\\Guides\\Handlers\\PersistCacheHandler', 'phpDocumentor\\Guides\\RenderCommand' => 'phpDocumentor\\Guides\\Handlers\\RenderHandler', 'phpDocumentor\\Guides\\RestructuredText\\ParseDirectoryCommand' => 'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseDirectoryHandler', 'phpDocumentor\\Guides\\RestructuredText\\ParseFileCommand' => 'phpDocumentor\\Guides\\RestructuredText\\Handlers\\ParseFileHandler']), new \League\Tactician\Handler\MethodNameInflector\HandleInflector())]);
    }
}
