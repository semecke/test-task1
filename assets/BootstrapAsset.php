<?php


namespace app\assets;


use yii\web\View;

/**
 * Class BootstrapAsset
 * @package app\assets
 */
class BootstrapAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];

    public $css = [
        'css/bootstrap.min.css',
    ];

    public $js = [
        'js/bootstrap.bundle.min.js',
    ];
}