<?php

namespace aneeshikmat\yii2\Yii2TimerCountDown;

use yii\web\AssetBundle;
use Yii;

class Yii2TimerCountDownAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];


    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        $this->css = [
            'css/Yii2TimerCountDown.css'
        ];

        $this->js = [
            'js/Yii2TimerCountDown.js'
        ];
        parent::init();
    }

}
