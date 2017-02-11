<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\nsign\assets\NsignAsset;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\nsign\models\ComponentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Главный модуль';
$this->params['breadcrumbs'][] = $this->title;

NsignAsset::register($this);
?>

<div class="nsign-default-index col-sm-6">
    <div id="imessage" class="alert alert-warning" role="alert" style="height:50px;"></div>
	<?php
        foreach ($dataProviderComponent as $item) {
            echo Html::checkbox('components', false, ['label' =>  $item['name'], 'value' => $item['id']  ]) . "<br>";
        }
    ?>
</div>
<div class="appendHere col-sm-6">
    <ul class="list-group"></ul>
</div>
