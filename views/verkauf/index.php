<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Verkaufs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verkauf-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Verkauf'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'VerkaufNr',
            [
                'attribute' => 'KundenNr',
                'value' => function ($data) {
                    if (!empty($data->kundenNr)) {
                        return $data->kundenNr->Vorname . ' ' . $data->kundenNr->Nachname;
                    }
                }
            ],
            [
                'attribute' => 'KarteNr',
                'value' => function ($data) {
                    if (!empty($data->karteNr)) {
                        return $data->karteNr->Erster_Einkauf ;
                    }
                }
            ],
                    
           [
                'attribute' => 'ProduktgruppeNr',
                'value' => function ($data) {
                    if (!empty($data->produktgruppeNr)) {
                        return $data->produktgruppeNr->Produktgruppe ;
                    }
                }
            ],
            'Betrag',
            'Dataum',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
