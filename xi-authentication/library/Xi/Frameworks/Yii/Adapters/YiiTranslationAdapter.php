<?php

namespace Xi\DomainUtilities\BaseClasses\Adapters;

use Xi\DomainUtilities\BaseClasses\Adapters\TranslationAdapter;

class YiiTranslationAdapter extends TranslationAdapter
{
    public function getTranslation($message, $params = null)
    {
        Yii::t($params['category'], $message);
    }
}