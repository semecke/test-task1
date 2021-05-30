<?php


namespace app\assets;


use yii\web\View;

/**
 * Class JQueryDataTables
 * @package app\assets
 */
class JQueryDataTables extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];

    public $css = [
        'css/jquery.dataTables.min.css'
    ];

    public $js = [
        'js/jquery.dataTables.min.js',
    ];
}