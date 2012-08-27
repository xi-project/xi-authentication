<?php
namespace Xi\DomainUtilities\BaseClasses;

use \ReflectionClass;

abstract class DomainBase
{
    /**
     * Get the namespace to the Infrastructure from the concrete class
     * 
     * @return string
     */
    protected function getInfrastructureNamespace()
    {
        $refl = new ReflectionClass(get_class($this));
        $exploded = explode('\\', $refl->getNamespaceName());
        
        return $exploded[0].'\\'.$exploded[1].'\\Infrastructure\\';
    }

    /**
     * Get the namespace to the Domain from the concrete class
     * 
     * @return string
     */
    protected function getDomainNamespace()
    {
        $refl = new ReflectionClass(get_class($this));
        $exploded = explode('\\', $refl->getNamespaceName());
        
        return $exploded[0].'\\'.$exploded[1].'\\Domain\\';
    }

    /**
     * Get the namespace to the ComponentRoot from the concrete class
     * 
     * @return string
     */
    protected function getNamespaceRoot()
    {
        $refl = new ReflectionClass(get_class($this));
        $exploded = explode('\\', $refl->getNamespaceName());
        
        return $exploded[0].'\\'.$exploded[1].'\\';
    }
}