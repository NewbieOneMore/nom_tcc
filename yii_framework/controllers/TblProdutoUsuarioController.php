<?php

namespace app\controllers;

use Yii;
use app\controllers\TblPedidoProdutoController;
use app\models\TblPagamento;
use app\models\TblProdutoUsuario;
use app\models\TblUsuario;
use app\models\TblPedido;
use app\models\TblPedidoProduto;
use app\models\TblProduto;
use app\widgets\Alert;
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

    //Carrinho
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

    public static function getCount()
    {
        $count = 0;
        $cart = new ShoppingCart();
        $data = $cart->getPositions();
        $count = count($data);
        return $count;
    }

    public function getNomeProduto($nomeProduto)
    {
        return $nomeProduto = TblProduto::find(['nomeProduto' => $nomeProduto])->one();
    }

    public function actionCheckout()
    {
        $cart = new ShoppingCart();
        $data = $cart->getPositions();
        if (count($data) != 0) {
            $idpagamento = (int)$_POST['idPagamento'];
            $precoProduto = (float)$_POST['precoProduto'];
            $quantidade = $_POST['quantidade'];
            $idProduto = $_POST['idProduto'];
            foreach ($cart->getPositions() as $i => $data) {
                $i = array_search($i, $idProduto);

                $ipreco[$i] = $data->precoProduto * $quantidade[$i];

                $total = array_sum($ipreco);
            }
            var_dump($idpagamento);
            die();
            $pedido = new TblPedido();
            $pedido->idUsuario = Yii::$app->user->identity->id;
            $pedido->dataPedido = date('Y-m-d H:i:s');
            $pedido->precoPedido = $total;
            $pedido->idPagamento = 1;
            /* $pedido->idPagamento = $idpagamento; */
            $pedido->pagPedido = 0;
            $pedido->save(false);
            foreach ($cart->getPositions() as $i => $data) {
                $i = array_search($i, $idProduto);
                $pedidoproduto = new TblPedidoProduto();
                $pedidoproduto->idPedido = $pedido->idPedido;
                $pedidoproduto->idProduto = $data->idProduto = $data->id;
                $data->estqProduto -= $quantidade[$i];            
                $cart->put($data, $quantidade[$i]);
                $pedidoproduto->qtdProduto = $quantidade[$i];
                $pedidoproduto->valorProduto = $data->precoProduto;
                $pedidoproduto->save(false);
                $data->save(false);
            }
            $cart->removeAll();
            return $this->redirect('/nom_tcc/yii_framework/web/tbl-produto-usuario/');
        }
        echo '<script>alert("O carrinho está vazio")</script>';
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
            return $this->redirect('/nom_tcc/yii_framework/web/tbl-produto-usuario/');
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
