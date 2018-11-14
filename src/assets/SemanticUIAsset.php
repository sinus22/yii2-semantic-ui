<?php
/**
 * Created by PhpStorm.
 * User: Arslan
 * Date: 31.10.2018
 * Time: 17:42
 */

namespace sinus\semanticUI\assets;


use yii\web\AssetBundle;

class SemanticUIAsset extends AssetBundle
{
    public $sourcePath = '@bower/semantic/dist';

    public $css = [
        'semantic.css',
    ];
    public $js = [
        'semantic.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}