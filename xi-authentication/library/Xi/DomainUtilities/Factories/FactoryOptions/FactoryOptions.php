<?php

namespace Xi\DomainUtilities\Factories\FactoryOptions;

class FactoryOptions
{
    protected $options;
    
    protected $adapters;
    
    public static function create()
    {
        return new FactoryOptions();
    }
    
    protected function getOption($optionName)
    {
        if(isset($this->options[$optionName])) {
            return $this->options[$optionName];
        }
        else {
            return null;
        }
    }
    
    protected function setOption($optionName, $optionValue)
    {
        $this->options[$optionName] = $optionValue;
    }
    
    public function getNamespace()
    {
        if( ($namespace = $this->getOption('namespace') ) != null) {
            return $namespace;
        }
        else {
            return "";
        }
    }
    
    public function setNamespace($namespace)
    {
        $this->setOption('namespace', $namespace);
        
        return $this;
    }
    
    public function getFramework()
    {
        if( ($framework = $this->getOption('framework') ) != null) {
            return $framework;
        }
        else {
            return "";
        }
    }
    
    public function setFramework($framework)
    {
        $this->setOption('framework', $framework);
        
        return $this;
    }
    
    public function getInterfaces()
    {
        if( ($interfaces = $this->getOption('interfaces') ) != null) {
            return $interfaces;
        }
        else {
            return array();
        }
    }
    
    public function setInterfaces($interfaces)
    {
        $this->setOption('interfaces', $interfaces);
        
        return $this;
    }
    
    public function isRepositoryCollection()
    {
        if( ($repositoryCollection = $this->getOption('repositoryCollection') ) != null) {
            return $repositoryCollection;
        }
        else {
            return false;
        }
    }
    
    public function setAsRepositoryCollection()
    {
        $this->setOption('repositoryCollection', true);
        
        return $this;
    }
    
    public function setAdapter(Adapter $adapter)
    {
        $this->adapters[$adapter->getType()] = $adapter;
    }
    
    public function getTranslationAdapter()
    {
        return (isset($this->adapters['translationAdapter']) ?
                    $this->adapters['translationAdapter'] :
                    null
               );
    }
    
    public function getExceptionResponseAdapter()
    {
        return (isset($this->adapters['exceptionResponseAdapter']) ?
                    $this->adapters['exceptionResponseAdapter'] :
                    null
               );
    }
}