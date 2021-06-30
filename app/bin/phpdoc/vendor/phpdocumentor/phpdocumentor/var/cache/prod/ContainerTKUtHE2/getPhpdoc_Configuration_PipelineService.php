<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPhpdoc_Configuration_PipelineService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpdoc.configuration.pipeline' shared service.
     *
     * @return \League\Pipeline\Pipeline
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'pipeline'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'StageInterface.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'pipeline'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'PipelineInterface.php';
        include_once \dirname(__DIR__, 6).''.\DIRECTORY_SEPARATOR.'league'.\DIRECTORY_SEPARATOR.'pipeline'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Pipeline.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Pipeline'.\DIRECTORY_SEPARATOR.'PipelineFactory.php';

        return $container->privates['phpdoc.configuration.pipeline'] = \phpDocumentor\Pipeline\PipelineFactory::create(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['phpDocumentor\\Pipeline\\Stage\\Configure'] ?? $container->load('getConfigureService'));
            yield 1 => ($container->privates['phpDocumentor\\Pipeline\\Stage\\TransformToPayload'] ?? $container->load('getTransformToPayloadService'));
            yield 2 => ($container->privates['phpDocumentor\\Pipeline\\Stage\\InitializeBuilderFromConfig'] ?? $container->load('getInitializeBuilderFromConfigService'));
            yield 3 => ($container->privates['phpDocumentor\\Pipeline\\Stage\\Cache\\PurgeCachesWhenForced'] ?? $container->load('getPurgeCachesWhenForcedService'));
        }, 4));
    }
}
