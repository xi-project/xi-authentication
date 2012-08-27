<?php

namespace Xi\Frameworks\Yii\Adapters;

use Xi\DomainUtilities\BaseClasses\Adapters\ExceptionResponseAdapter;

class YiiExtExceptionResponseAdapter extends ExceptionResponseAdapter
{
    private $extResponse;
    
    public function parseExceptionResponse($message)
    {
        $this->extResponse = new ExtResponse();
        $this->extResponse->message = $this->translationAdapter
                ->getTranslation($message, array('category' => 'Exception'));
        $this->extResponse->success = false;
    }
}