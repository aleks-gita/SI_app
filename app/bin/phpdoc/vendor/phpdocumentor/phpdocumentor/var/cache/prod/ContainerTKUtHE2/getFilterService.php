<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFilterService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Descriptor\Filter\Filter' shared autowired service.
     *
     * @return \phpDocumentor\Descriptor\Filter\Filter
     */
    public static function do($container, $lazyLoad = true)
    {
        if ($lazyLoad) {
            return $container->privates['phpDocumentor\\Descriptor\\Filter\\Filter'] = $container->createProxy('Filter_6ae6af3', function () use ($container) {
                return \Filter_6ae6af3::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = self::do($container, false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Descriptor'.\DIRECTORY_SEPARATOR.'Filter'.\DIRECTORY_SEPARATOR.'Filter.php';

        return new \phpDocumentor\Descriptor\Filter\Filter(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['phpDocumentor\\Descriptor\\Filter\\StripIgnore'] ?? ($container->privates['phpDocumentor\\Descriptor\\Filter\\StripIgnore'] = new \phpDocumentor\Descriptor\Filter\StripIgnore()));
            yield 1 => ($container->privates['phpDocumentor\\Descriptor\\Filter\\StripIgnoredTags'] ?? $container->load('getStripIgnoredTagsService'));
            yield 2 => ($container->privates['phpDocumentor\\Descriptor\\Filter\\StripInternal'] ?? $container->load('getStripInternalService'));
            yield 3 => ($container->privates['phpDocumentor\\Descriptor\\Filter\\StripOnVisibility'] ?? $container->load('getStripOnVisibilityService'));
        }, 4));
    }
}
