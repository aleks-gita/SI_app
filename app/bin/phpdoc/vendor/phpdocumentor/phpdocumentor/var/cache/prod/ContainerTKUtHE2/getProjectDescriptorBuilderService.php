<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProjectDescriptorBuilderService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Descriptor\ProjectDescriptorBuilder' shared autowired service.
     *
     * @return \phpDocumentor\Descriptor\ProjectDescriptorBuilder
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Descriptor'.\DIRECTORY_SEPARATOR.'ProjectDescriptorBuilder.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Descriptor'.\DIRECTORY_SEPARATOR.'Builder'.\DIRECTORY_SEPARATOR.'AssemblerFactory.php';
        include_once \dirname(__DIR__, 5).''.\DIRECTORY_SEPARATOR.'reflection-docblock'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'DocBlock'.\DIRECTORY_SEPARATOR.'ExampleFinder.php';

        return $container->privates['phpDocumentor\\Descriptor\\ProjectDescriptorBuilder'] = new \phpDocumentor\Descriptor\ProjectDescriptorBuilder(\phpDocumentor\Descriptor\Builder\AssemblerFactory::createDefault(($container->privates['phpDocumentor\\Reflection\\DocBlock\\ExampleFinder'] ?? ($container->privates['phpDocumentor\\Reflection\\DocBlock\\ExampleFinder'] = new \phpDocumentor\Reflection\DocBlock\ExampleFinder()))), ($container->privates['phpDocumentor\\Descriptor\\Filter\\Filter'] ?? $container->load('getFilterService')), new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['phpDocumentor\\Transformer\\Writer\\Graph'] ?? $container->load('getGraphService'));
            yield 1 => ($container->privates['phpDocumentor\\Transformer\\Writer\\RenderGuide'] ?? $container->load('getRenderGuideService'));
        }, 2));
    }
}
