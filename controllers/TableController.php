<?php

namespace app\controllers;

class TableController extends \yii\web\Controller {

    public function actionIndex() {
        $tableSchema = \Yii::$app->db->schema->getTableSchema('verkauf');
        if (null === $tableSchema) {
            \app\models\TableGenerator::generate();
        }
        return $this->redirect(\Yii::$app->urlManager->createUrl(['verkauf/index']));
    }

}
