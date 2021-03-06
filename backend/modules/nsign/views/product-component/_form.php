<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\nsign\models\ProductComponent */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="product-component-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(
            ArrayHelper::map($dataProviderProduct, 'id', 'name')
        ) ?>

    <?= $form->field($model, 'component_id')->dropDownList(
            ArrayHelper::map($dataProviderComponent, 'id', 'name')
        ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
