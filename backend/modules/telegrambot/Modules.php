<?php

namespace backend\modules\telegrambot;

/**
 * telegrambot module definition class
 */
class Modules extends \yii\base\Module
{
    public $defaultRoute = 'bot-murojatlar/index';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\telegrambot\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
