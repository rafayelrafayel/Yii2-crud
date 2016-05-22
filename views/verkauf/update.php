<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Verkauf */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => 'Verkauf',
        ]) . $model->VerkaufNr;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Verkaufs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->VerkaufNr, 'url' => ['view', 'id' => $model->VerkaufNr]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="verkauf-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'KundenList' => $KundenList,
        'KarteList' => $KarteList,
        'ProduktgruppeList' => $ProduktgruppeList,
    ])
    ?>

</div>
