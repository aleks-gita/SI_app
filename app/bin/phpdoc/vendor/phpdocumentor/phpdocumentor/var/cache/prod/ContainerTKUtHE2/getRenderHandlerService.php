<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRenderHandlerService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Guides\Handlers\RenderHandler' shared autowired service.
     *
     * @return \phpDocumentor\Guides\Handlers\RenderHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Guides'.\DIRECTORY_SEPARATOR.'Handlers'.\DIRECTORY_SEPARATOR.'RenderHandler.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Guides'.\DIRECTORY_SEPARATOR.'Metas.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Guides'.\DIRECTORY_SEPARATOR.'Documents.php';

        return $container->privates['phpDocumentor\\Guides\\Handlers\\RenderHandler'] = new \phpDocumentor\Guides\Handlers\RenderHandler(($container->privates['phpDocumentor\\Guides\\Metas'] ?? ($container->privates['phpDocumentor\\Guides\\Metas'] = new \phpDocumentor\Guides\Metas())), ($container->privates['phpDocumentor\\Guides\\Documents'] ?? ($container->privates['phpDocumentor\\Guides\\Documents'] = new \phpDocumentor\Guides\Documents())));
    }
}