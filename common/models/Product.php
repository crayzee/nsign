<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ProductComponent[] $productComponents
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 70],
            [['name'], 'unique', 'message' => 'У вас уже есть такое блюдо'],
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
        ];
    }

    /**
     * Many-to-many relationship
     * @return \yii\db\ActiveQuery
     */
    public function getComponents()
    {
        return $this
                ->hasMany(Component::className(), ['id' => 'component_id' ])
                ->viaTable('product_component', ['product_id' => 'id']);
    }
		
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductComponents()
    {
        return $this->hasMany(ProductComponent::className(), ['product_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ComponentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}