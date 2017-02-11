<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "component".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_hidden
 *
 * @property ProductComponent[] $productComponents
 */
class Component extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'component';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_hidden'], 'integer'],
            [['name'], 'string', 'max' => 70],
            [['name'], 'unique', 'message' => 'У вас уже есть такой ингредиент'],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер записи в БД',
            'name' => 'Название',
            'is_hidden' => 'Скрыто',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductComponents()
    {
        return $this->hasMany(ProductComponent::className(), ['component_id' => 'id']);
    }
}