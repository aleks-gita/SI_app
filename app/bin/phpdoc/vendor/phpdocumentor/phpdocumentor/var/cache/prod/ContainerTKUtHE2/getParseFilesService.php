<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getParseFilesService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Pipeline\Stage\Parser\ParseFiles' shared autowired service.
     *
     * @return \phpDocumentor\Pipeline\Stage\Parser\ParseFiles
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Pipeline'.\DIRECTORY_SEPARATOR.'Stage'.\DIRECTORY_SEPARATOR.'Parser'.\DIRECTORY_SEPARATOR.'ParseFiles.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Reflection'.\DIRECTORY_SEPARATOR.'Middleware'.\DIRECTORY_SEPARATOR.'Middleware.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Parser'.\DIRECTORY_SEPARATOR.'Middleware'.\DIRECTORY_SEPARATOR.'ReEncodingMiddleware.php';

        return $container->privates['phpDocumentor\\Pipeline\\Stage\\Parser\\ParseFiles'] = new \phpDocumentor\Pipeline\Stage\Parser\ParseFiles(($container->privates['phpDocumentor\\Parser\\Parser'] ?? $container->load('getParserService')), ($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService')), ($container->privates['phpDocumentor\\Parser\\Middleware\\ReEncodingMiddleware'] ?? ($container->privates['phpDocumentor\\Parser\\Middleware\\ReEncodingMiddleware'] = new \phpDocumentor\Parser\Middleware\ReEncodingMiddleware())));
    }
}
