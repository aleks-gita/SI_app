<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGarbageCollectCacheService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Pipeline\Stage\Cache\GarbageCollectCache' shared autowired service.
     *
     * @return \phpDocumentor\Pipeline\Stage\Cache\GarbageCollectCache
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Pipeline'.\DIRECTORY_SEPARATOR.'Stage'.\DIRECTORY_SEPARATOR.'Cache'.\DIRECTORY_SEPARATOR.'GarbageCollectCache.php';

        return $container->privates['phpDocumentor\\Pipeline\\Stage\\Cache\\GarbageCollectCache'] = new \phpDocumentor\Pipeline\Stage\Cache\GarbageCollectCache(($container->privates['phpDocumentor\\Descriptor\\Cache\\ProjectDescriptorMapper'] ?? $container->load('getProjectDescriptorMapperService')));
    }
}