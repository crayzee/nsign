<?php

namespace app\modules\nsign\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class NsignAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/nsign/assets';
    public $js = [
        'js/nsign_client.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}