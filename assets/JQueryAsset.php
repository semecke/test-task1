<?php

namespace app\assets;

use yii\web\View;

/**
 * Class JQueryAsset
 * @package app\assets
 */
class JQueryAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];

    public $js = [
        'js/jquery-3.5.1.min.js',
    ];
}

