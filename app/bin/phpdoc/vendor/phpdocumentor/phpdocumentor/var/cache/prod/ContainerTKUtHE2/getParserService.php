<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getParserService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Parser\Parser' shared autowired service.
     *
     * @return \phpDocumentor\Parser\Parser
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Parser'.\DIRECTORY_SEPARATOR.'Parser.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection-common'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'ProjectFactory.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'ProjectFactory.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'ProjectFactoryStrategy.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'AbstractFactory.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'Argument.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'nikic'.\DIRECTORY_SEPARATOR.'php-parser'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'PhpParser'.\DIRECTORY_SEPARATOR.'PrettyPrinterAbstract.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'nikic'.\DIRECTORY_SEPARATOR.'php-parser'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'PhpParser'.\DIRECTORY_SEPARATOR.'PrettyPrinter'.\DIRECTORY_SEPARATOR.'Standard.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'Class_.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'ClassConstant.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'GlobalConstant.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'DocBlock.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection-docblock'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'DocBlockFactoryInterface.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection-docblock'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'DocBlockFactory.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'Function_.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'Interface_.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'Method.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'Property.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'Trait_.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'Factory'.\DIRECTORY_SEPARATOR.'File.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Parser'.\DIRECTORY_SEPARATOR.'FileFactory.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Php'.\DIRECTORY_SEPARATOR.'NodesFactory.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'stopwatch'.\DIRECTORY_SEPARATOR.'Stopwatch.php';

        $a = new \PhpParser\PrettyPrinter\Standard();

        return $container->privates['phpDocumentor\\Parser\\Parser'] = new \phpDocumentor\Parser\Parser(new \phpDocumentor\Reflection\Php\ProjectFactory([0 => new \phpDocumentor\Reflection\Php\Factory\Argument($a), 1 => new \phpDocumentor\Reflection\Php\Factory\Class_(), 2 => new \phpDocumentor\Reflection\Php\Factory\ClassConstant($a), 3 => new \phpDocumentor\Reflection\Php\Factory\GlobalConstant($a), 4 => new \phpDocumentor\Reflection\Php\Factory\DocBlock(\phpDocumentor\Reflection\DocBlockFactory::createInstance()), 5 => new \phpDocumentor\Reflection\Php\Factory\Function_(), 6 => new \phpDocumentor\Reflection\Php\Factory\Interface_(), 7 => new \phpDocumentor\Reflection\Php\Factory\Method(), 8 => new \phpDocumentor\Reflection\Php\Factory\Property($a), 9 => new \phpDocumentor\Reflection\Php\Factory\Trait_(), 10 => \phpDocumentor\Parser\FileFactory::createInstance(\phpDocumentor\Reflection\Php\NodesFactory::createInstance(), new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['phpDocumentor\\Parser\\Middleware\\StopwatchMiddleware'] ?? $container->load('getStopwatchMiddlewareService'));
            yield 1 => ($container->privates['phpDocumentor\\Parser\\Middleware\\EmittingMiddleware'] ?? ($container->privates['phpDocumentor\\Parser\\Middleware\\EmittingMiddleware'] = new \phpDocumentor\Parser\Middleware\EmittingMiddleware()));
            yield 2 => ($container->privates['phpDocumentor\\Parser\\Middleware\\CacheMiddleware'] ?? $container->load('getCacheMiddlewareService'));
            yield 3 => ($container->privates['phpDocumentor\\Parser\\Middleware\\ErrorHandlingMiddleware'] ?? $container->load('getErrorHandlingMiddlewareService'));
            yield 4 => ($container->privates['phpDocumentor\\Parser\\Middleware\\ReEncodingMiddleware'] ?? ($container->privates['phpDocumentor\\Parser\\Middleware\\ReEncodingMiddleware'] = new \phpDocumentor\Parser\Middleware\ReEncodingMiddleware()));
        }, 5))]), ($container->privates['debug.stopwatch'] ?? ($container->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), ($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService')));
    }
}
