<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Verkauf */
/* @var $form yii\widgets\ActiveForm */
$promt = ['prompt' => '--Choose--']
?>

<div class="verkauf-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KundenNr')->dropDownList($KundenList, $promt); ?>
    
    <?= $form->field($model, 'KarteNr')->dropDownList($KarteList, $promt); ?>
    
    <?= $form->field($model, 'ProduktgruppeNr')->dropDownList($ProduktgruppeList, $promt); ?>

    <?= $form->field($model, 'Betrag')->textInput(['maxlength' => true]) ?>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
