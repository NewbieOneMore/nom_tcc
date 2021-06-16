<?php

namespace app\controllers;

use Yii;
use app\controllers\TblPedidoProdutoController;
use app\models\TblProdutoUsuario;
use app\models\TblUsuario;
use app\models\TblPedido;
use app\models\TblPedidoProduto;
use app\models\TblProduto;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yz\shoppingcart\ShoppingCart;
use yii\db\BaseActiveRecord;


/**
 * TblProdutoUsuarioController implements the CRUD actions for TblProdutoUsuario model.
 */
class TblProdutoUsuarioController extends Controller
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
     * Lists all TblProdutoUsuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $itemsCount = \Yii::$app->cart->getCount();
        $dataProvider = new ActiveDataProvider([
            'query' => TblProdutoUsuario::find(),
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblProdutoUsuario model.
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
     * Creates a new TblProdutoUsuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblProdutoUsuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProduto]);
        }

        return $this->render('tbl-produto-create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblProdutoUsuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProduto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblProdutoUsuario model.
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

    //CARRINHO
    public function actionCart()
    {
        $cart = new ShoppingCart();
        $dataProvider = new ActiveDataProvider([
            'query' => TblProdutoUsuario::find(),
        ]);
        $data = $cart->getPositions();

        return $this->render('cart', [
            'dataProvider' => $dataProvider,
            'data' => $data,
        ]);
    }

    public function actionAddToCart($idProduto)
    {
        $cart = new ShoppingCart();

        $model = TblProdutoUsuario::findOne($idProduto);
        if ($model) {
            $cart->put($model, 1);
            $data = $cart->getPositions();
            return $this->render('cart', [
                'data' => $data,
            ]);
        }
        throw new NotFoundHttpException();
    }

    public function getNomeProduto($nomeProduto)
    {
        return $nomeProduto = TblProduto::find(['nomeProduto' => $nomeProduto])->one();
    }


    public function actionCheckout()
    {
        $cart = new ShoppingCart();
        $pedido = new TblPedido();
        $idUsuario = TblUsuario::find()->where(['idUsuario' => Yii::$app->user->identity->id])->one();
            $pedido->idUsuario = $idUsuario;
            $pedido->dataPedido = date('Y-m-d H:i:s');
            $pedido->precoPedido = \Yii::$app->cart->getCost();
            $pedido->pagPedido = 0;
            $pedido->idPagamento = 1;
            $pedido->save();
        foreach ($cart->getPositions() as $data) {
            $pedidoproduto = new TblPedidoProduto();
            $pedidoproduto->idPedido = $pedido->idPedido;
            $pedidoproduto->idProduto = $data->id;
            $pedidoproduto->qtdProduto = \Yii::$app->cart->getCount();
            $pedidoproduto->save();
        }
        $cart->removeAll();
        return $this->actionIndex();
    }

    public function actionRemove($id)
    {
        $cart = new ShoppingCart();
        $position = $cart->getPositionById($id);
        $cart->removeById($position->getId());
        $data = $cart->getPositions();
        if (count($data) > 0) {
            return $this->render('cart', [
                'data' => $data,
            ]);
        } else {
            return $this->actionIndex();
        }
    }
    /**
     * Finds the TblProdutoUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblProdutoUsuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblProdutoUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
