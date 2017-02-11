<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\nsign\models\ProductComponent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Состав блюд', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-component-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        'id',
        [ 'attribute' => 'product_id', 'label' => 'Номер записи блюда в таблице product'],
        [ 'attribute' => 'component_id', 'label' => 'Номер записи ингредиента в таблице component'],
            
        ],
    ]) ?>

</div>
