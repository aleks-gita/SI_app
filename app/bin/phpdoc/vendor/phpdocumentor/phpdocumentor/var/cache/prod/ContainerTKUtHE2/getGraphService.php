<?php

namespace ContainerTKUtHE2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGraphService extends phpDocumentor_KernelProdContainer
{
    /*
     * Gets the private 'phpDocumentor\Transformer\Writer\Graph' shared autowired service.
     *
     * @return \phpDocumentor\Transformer\Writer\Graph
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Transformer'.\DIRECTORY_SEPARATOR.'Writer'.\DIRECTORY_SEPARATOR.'WriterAbstract.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Descriptor'.\DIRECTORY_SEPARATOR.'ProjectDescriptor'.\DIRECTORY_SEPARATOR.'WithCustomSettings.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Transformer'.\DIRECTORY_SEPARATOR.'Writer'.\DIRECTORY_SEPARATOR.'Graph.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Transformer'.\DIRECTORY_SEPARATOR.'Writer'.\DIRECTORY_SEPARATOR.'Graph'.\DIRECTORY_SEPARATOR.'Generator.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Transformer'.\DIRECTORY_SEPARATOR.'Writer'.\DIRECTORY_SEPARATOR.'Graph'.\DIRECTORY_SEPARATOR.'GraphVizClassDiagram.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Transformer'.\DIRECTORY_SEPARATOR.'Writer'.\DIRECTORY_SEPARATOR.'Graph'.\DIRECTORY_SEPARATOR.'PlantumlClassDiagram.php';

        return $container->privates['phpDocumentor\\Transformer\\Writer\\Graph'] = new \phpDocumentor\Transformer\Writer\Graph(new \phpDocumentor\Transformer\Writer\Graph\GraphVizClassDiagram(), new \phpDocumentor\Transformer\Writer\Graph\PlantumlClassDiagram(($container->privates['monolog.logger'] ?? $container->load('getMonolog_LoggerService'))));
    }
}