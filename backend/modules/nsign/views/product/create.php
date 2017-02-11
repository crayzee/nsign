<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\nsign\models\Product */

$this->title = 'Создать новое блюдо';
$this->params['breadcrumbs'][] = ['label' => 'Блюда', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
