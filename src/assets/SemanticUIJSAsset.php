<?php

namespace sinus\semanticUI\assets;

use Yii;
use yii\web\AssetBundle;

class SemanticUIJSAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/semantic/dist';

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'sinus\semanticUI\assets\SemanticUICSSAsset'
    ];

    public function init()
    {
        $postfix = YII_DEBUG ? '' : '.min';
        $this->js[] = 'semantic' . $postfix . '.js';

        parent::init();
    }
}
