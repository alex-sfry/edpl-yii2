<?php

namespace app\assets;

use yii\web\AssetBundle;

class TomSelectAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css =  ['src/css/tom-select.bootstrap5.min.css'];
    public $js = ['src/js/tom-select.base.min.js'];
    // public $jsOptions = ['type' => 'module'];
}
