<?php

namespace app\modules\nsign\controllers;

use Yii;
use yii\web\Controller;
use common\models\Component;
use common\models\Product;
use common\models\ProductComponent;

/**
 * Default controller for the `nsign` module
 */
class DefaultController extends Controller
{
    
    /**
     * Renders the index view for the module
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProviderComponent = Component::find()
            ->where(['=', 'is_hidden', 0 ])
            ->asArray()
            ->all();
				
        return $this->render('index', [
            'dataProviderComponent' => $dataProviderComponent,
        ]);
    }
    
    /**
     * Функция принимает ajax post данные от клиентского браузера, 
     * состоящие из массива id выбранных ингредиентов ['1','2','3','4']. 
     * На основании этого строится запрос к бд вида
     * 
     *    SELECT `product_id`, `product`.`name`, 
     *     SUM(if(component_id IN ('1','2','3','4'), 1, 0)) AS occurance, 
     *     MAX(component.is_hidden) AS ihidden 
     *     FROM `product_component` 
     *     LEFT JOIN `component` ON product_component.component_id = component.id 
     *     LEFT JOIN `product` ON product_component.product_id = product.id 
     *     GROUP BY `product_id` ORDER BY `occurance` DESC' 
     * 
     * с получением массива всех ингредиентов, отсортированных по кол-ву
     * совпадений ингредиентов (поле с названием occurance)
     * также с учетом поля ihidden, где 0 значит ни один ингредиент не скрыт,
     * а 1 означает что как минимум один ингредиент скрыт, вида:
     *
     * array(2) {
     *     [0]=> array(4) { 
     *         ["product_id"] => string(1) "2"
     *         ["name"] => string(14) "Яичница"
     *         ["occurance"] => string(1) "4"     
     *         ["ihidden"] => string(1) "0"
     *      } 
     *      [1]=> array(4) { 
     *         ["product_id"] => string(1) "1"
     *         ["name"] => string(14) "Блины"
     *         ["occurance"] => string(1) "2"     
     *         ["ihidden"] => string(1) "0"
     *      } 
     * }
     *
     * Отдается обратно клиентскому браузеру либо html разметка вида
     * <li class="list-group-item">
     *     Яичница <i class="glyphicon glyphicon-chevron-left"></i>4<i class="glyphicon glyphicon-chevron-right"></i>
     * </li> если совпадений более 2-х, а также нет скрытых ингредиентов
     * либо пустая строка если совпадений менее 2-х
     *
     * @return string
     */
    public function actionReceive()
    {				
        if (Yii::$app->request->isAjax) {
            // request is ajax request
            $post = Yii::$app->request->post();
            $all_ingredients = '';
            foreach ($post['data'] as $item) {
                $all_ingredients .= "'$item',";
            }
            $all_ingredients = rtrim($all_ingredients,",");
            
            $query_result = (new \yii\db\Query())
                ->select(['product_id', 'product.name', "SUM(if(component_id IN ($all_ingredients), 1, 0)) AS occurance, MAX(component.is_hidden) AS ihidden"])
                ->from('product_component')
                ->groupBy('product_id')
                ->orderBy(['occurance' => SORT_DESC])
                ->join('LEFT JOIN', 'component', 'product_component.component_id = component.id')
                ->join('LEFT JOIN', 'product', 'product_component.product_id = product.id')
                ->all();
            
           	foreach ($query_result as $item) {						
                if ($item['occurance'] >= 2 && !$item['ihidden']) {
                    echo "<li class='list-group-item'>$item[name] <i class='glyphicon glyphicon-chevron-left'></i>$item[occurance]<i class='glyphicon glyphicon-chevron-right'></i></li>";
                }						
            }
            return;
        }				
	}
}