<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Verkauf */

$this->title = Yii::t('app', 'Create Verkauf');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Verkaufs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verkauf-create">

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
