<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\nsign\models\ProductComponent */

$this->title = 'Редактировать входящий состав блюда: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Управление блюдами', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="product-component-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderProduct' => $dataProviderProduct,
        'dataProviderComponent' => $dataProviderComponent,
    ]) ?>

</div>
