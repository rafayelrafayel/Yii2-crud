<?php

namespace app\controllers;

use Yii;
use app\models\Verkauf;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VerkaufController implements the CRUD actions for Verkauf model.
 */
class VerkaufController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Verkauf models.
     * @return mixed
     */
    public function actionIndex() {
        $tableSchema = Yii::$app->db->schema->getTableSchema('verkauf');
        if (null === $tableSchema) {
            throw new NotFoundHttpException('The requested page does not have table.');
        }




        $dataProvider = new ActiveDataProvider([
            'query' => Verkauf::find(),
        ]);




        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Verkauf model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Verkauf model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Verkauf();

        //get kunde list
        $KundenList = \app\models\Kunde::getListForDropDownList();
        //get karte list
        $KarteList = \app\models\Karte::getListForDropDownList();
        //get Produktgruppe list
        $ProduktgruppeList = \app\models\Produktgruppe::getListForDropDownList();





        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->VerkaufNr]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'KundenList' => $KundenList,
                        'KarteList' => $KarteList,
                        'ProduktgruppeList' => $ProduktgruppeList,
            ]);
        }
    }

    /**
     * Updates an existing Verkauf model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        //get kunde list
        $KundenList = \app\models\Kunde::getListForDropDownList();
        //get karte list
        $KarteList = \app\models\Karte::getListForDropDownList();
        //get Produktgruppe list
        $ProduktgruppeList = \app\models\Produktgruppe::getListForDropDownList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->VerkaufNr]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'KundenList' => $KundenList,
                        'KarteList' => $KarteList,
                        'ProduktgruppeList' => $ProduktgruppeList,
            ]);
        }
    }

    /**
     * Deletes an existing Verkauf model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Verkauf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Verkauf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Verkauf::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
