<?php

namespace ContainerTKUtHE2;

include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'phpDocumentor'.\DIRECTORY_SEPARATOR.'Descriptor'.\DIRECTORY_SEPARATOR.'Filter'.\DIRECTORY_SEPARATOR.'Filter.php';
class Filter_6ae6af3 extends \phpDocumentor\Descriptor\Filter\Filter implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder34b2e = null;
    private $initializer9f35b = null;
    private static $publicPropertiesa63b2 = [
        
    ];
    public function filter(\phpDocumentor\Descriptor\Filter\Filterable $descriptor) : ?\phpDocumentor\Descriptor\Filter\Filterable
    {
        $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, 'filter', array('descriptor' => $descriptor), $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
        return $this->valueHolder34b2e->filter($descriptor);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\phpDocumentor\Descriptor\Filter\Filter $instance) {
            unset($instance->pipeline);
        }, $instance, 'phpDocumentor\\Descriptor\\Filter\\Filter')->__invoke($instance);
        $instance->initializer9f35b = $initializer;
        return $instance;
    }
    public function __construct(iterable $filters)
    {
        static $reflection;
        if (! $this->valueHolder34b2e) {
            $reflection = $reflection ?? new \ReflectionClass('phpDocumentor\\Descriptor\\Filter\\Filter');
            $this->valueHolder34b2e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\phpDocumentor\Descriptor\Filter\Filter $instance) {
            unset($instance->pipeline);
        }, $this, 'phpDocumentor\\Descriptor\\Filter\\Filter')->__invoke($this);
        }
        $this->valueHolder34b2e->__construct($filters);
    }
    public function & __get($name)
    {
        $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, '__get', ['name' => $name], $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
        if (isset(self::$publicPropertiesa63b2[$name])) {
            return $this->valueHolder34b2e->$name;
        }
        $realInstanceReflection = new \ReflectionClass('phpDocumentor\\Descriptor\\Filter\\Filter');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder34b2e;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder34b2e;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
        $realInstanceReflection = new \ReflectionClass('phpDocumentor\\Descriptor\\Filter\\Filter');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder34b2e;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder34b2e;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, '__isset', array('name' => $name), $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
        $realInstanceReflection = new \ReflectionClass('phpDocumentor\\Descriptor\\Filter\\Filter');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder34b2e;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder34b2e;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, '__unset', array('name' => $name), $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
        $realInstanceReflection = new \ReflectionClass('phpDocumentor\\Descriptor\\Filter\\Filter');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder34b2e;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder34b2e;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, '__clone', array(), $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
        $this->valueHolder34b2e = clone $this->valueHolder34b2e;
    }
    public function __sleep()
    {
        $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, '__sleep', array(), $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
        return array('valueHolder34b2e');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\phpDocumentor\Descriptor\Filter\Filter $instance) {
            unset($instance->pipeline);
        }, $this, 'phpDocumentor\\Descriptor\\Filter\\Filter')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer9f35b = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer9f35b;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer9f35b && ($this->initializer9f35b->__invoke($valueHolder34b2e, $this, 'initializeProxy', array(), $this->initializer9f35b) || 1) && $this->valueHolder34b2e = $valueHolder34b2e;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder34b2e;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder34b2e;
    }
}

if (!\class_exists('Filter_6ae6af3', false)) {
    \class_alias(__NAMESPACE__.'\\Filter_6ae6af3', 'Filter_6ae6af3', false);
}
