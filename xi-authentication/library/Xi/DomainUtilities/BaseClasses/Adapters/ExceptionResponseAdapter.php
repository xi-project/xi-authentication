<?php

namespace Xi\DomainUtilities\BaseClasses\Adapters;

use Xi\DomainUtilities\BaseClasses\Adapters\TranslationAdapter;
use Xi\DomainUtilities\BaseClasses\Adapters\Adapter;

class ExceptionResponseAdapter extends Adapter
{
    /**
     * Framework dependent translation adapter
     * 
     * @var TranslationAdapter 
     */
    protected $translationAdapter;
    
    public function __construct()
    {
        
    }
    
    public function setTranslationAdapter(TranslationAdapter $translationAdapter)
    {
        $this->translationAdapter = $translationAdapter;
    }
    
    public function parseExceptionResponse($message)
    {
        return $this->translationAdapter->getTranslation($message);
    }
    
    final public function getType()
    {
        return "exceptionResponseAdapter";
    }
}