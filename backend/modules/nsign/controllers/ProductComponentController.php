<?php

namespace backend\modules\nsign\controllers;

use Yii;
use common\models\Product;
use common\models\Component;
use common\models\ProductComponent;
use common\models\ProductComponentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductComponentController implements the CRUD actions for ProductComponent model.
 */
class ProductComponentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductComponent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductComponentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductComponent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductComponent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductComponent();				
		
        // Данные в представление, чтобы была возможность отображать названия блюд/ингредиентов
        // а не просто их id
        $dataProviderComponent = Component::find()->asArray()->all();
        $dataProviderProduct = Product::find()->asArray()->all();			

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'dataProviderProduct' => $dataProviderProduct,
				'dataProviderComponent' => $dataProviderComponent,
            ]);
        }
    }

    /**
     * Updates an existing ProductComponent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        // Данные в представление, чтобы была возможность отображать названия блюд/ингредиентов
        // а не просто их id
        $dataProviderComponent = Component::find()->asArray()->all();
        $dataProviderProduct = Product::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'dataProviderProduct' => $dataProviderProduct,
                'dataProviderComponent' => $dataProviderComponent,
            ]);
        }
    }

    /**
     * Deletes an existing ProductComponent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductComponent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductComponent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductComponent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
