<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Verkauf */

$this->title = $model->VerkaufNr;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Verkaufs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verkauf-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->VerkaufNr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->VerkaufNr], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'VerkaufNr',
             [
                'attribute' => 'KundenNr',
                'value'=>$model->getKundenName()
            ],
            //'KundenNr',
           // 'KarteNr',
            [
                'attribute' => 'KarteNr',
                'value'=>$model->getKarteName()
            ],
            [
                'attribute' => 'ProduktgruppeNr',
                'value'=>$model->getProduktgruppeName()
            ],
            //'ProduktgruppeNr',
            'Betrag',
            'Dataum',
        ],
    ]) ?>

</div>
