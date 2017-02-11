<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_component".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $component_id
 *
 * @property Component $component
 * @property Product $product
 */
class ProductComponent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_component';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'component_id'], 'required'],
            [['product_id', 'component_id'], 'integer'],
            [['product_id', 'component_id'], 'unique', 'targetAttribute' => ['product_id', 'component_id'], 'message' => 'В таком блюде уже есть данный ингредиент'],
            [['component_id'], 'exist', 'skipOnError' => true, 'targetClass' => Component::className(), 'targetAttribute' => ['component_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер записи в БД',
            'product_id' => 'Блюдо',
            'component_id' => 'Ингредиент',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComponent()
    {
        return $this->hasOne(Component::className(), ['id' => 'component_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}