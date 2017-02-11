<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\nsign\controllers\ProductComponentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Components';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-component-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Component', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'component_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
