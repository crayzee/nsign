<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\nsign\models\ProductComponentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление составом продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-component-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Внести новый ингредиент в блюдо', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [ 'label' => 'Название блюда',
                'attribute' => 'product_id',
                'value' => function($dataProvider) {														
                        return $dataProvider->product->name;
                    }
            ],
								
            [
                'label' => 'Входящий ингредиент',
                'attribute' => 'component_id',
                'value' =>  function($dataProvider) {
														
                    return $dataProvider->component->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
