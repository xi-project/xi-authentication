<?php

namespace Xi\DomainUtilities\BaseClasses\Adapters;

use Xi\DomainUtilities\BaseClasses\Adapters\Adapter;

class TranslationAdapter extends Adapter
{
    public function __construct()
    {
        
    }
    
    public function getTranslation($message)
    {
        return $message;
    }
    
    final public function getType()
    {
        return "translationAdapter";
    }
}