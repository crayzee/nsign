<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\nsign\models\ComponentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление ингредиентами';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="component-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новый ингредиент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'name',
            [
                'attribute' => 'is_hidden',
                'label' => 'Ингредиент скрыт',
                'format' => 'text',
                'value' =>  function($dataProvider) {
                    switch($dataProvider->is_hidden) {
                        case '0': return '';                            
                        case '1': return 'Да';
                        default : break;                       
                    }                      
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'Удалить ингредиент? Все связанные данные будут обновлены в базе данных.',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>