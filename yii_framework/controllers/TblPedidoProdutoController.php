<?php

namespace app\controllers;

use Yii;
use app\models\TblPedidoProduto;
use app\models\TblPedidoProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblPedidoProdutoController implements the CRUD actions for TblPedidoProduto model.
 */
class TblPedidoProdutoController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all TblPedidoProduto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPedidoProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPedidoProduto model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblPedidoProduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPedidoProduto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPedidoProduto]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblPedidoProduto model.
     * If update is successful, the browser will be redirected to the 'view' page.  
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /* return $this->redirect(['index', 'id' => $model->idPedidoProduto]); */
            return Yii::$app->getResponse()->redirect('http://localhost/nom_tcc/yii_framework/web/index.php/tbl-pedido');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPedidoProduto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionFeed()
    {
        $api = new \RestClient([
            'base_url' => 'http://localhost/nom_tcc/yii_framework/web/api',
            'headers' => [
                'Accept' => 'application/json' 
            ]
        ]);
        
        $hoje = date("Y-m-d");
        $quantidade = 1;
        $valorProd = 4;
        $valortotal = $valorProd*$quantidade;
        $api->post('pedidoproduto/create', [
            
            'idPedido' => '54',
            'idProduto' => '2',
            'qtdProduto' => $quantidade,
            'valorProduto' => $valortotal,
            'retProduto' => 0,
        ]);

        $result = $api->get('/pedidoproduto');
        echo '<pre>'; print_r($result->response); die;

        return $this->render('feed');
    }

    /**
     * Finds the TblPedidoProduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPedidoProduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPedidoProduto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
