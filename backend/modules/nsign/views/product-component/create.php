<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\nsign\models\ProductComponent */

$this->title = 'Сформировать';
$this->params['breadcrumbs'][] = ['label' => 'Состав блюд', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-component-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderProduct' => $dataProviderProduct,
        'dataProviderComponent' => $dataProviderComponent,
    ]) ?>

</div>
