<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasien_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Pasien::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Pasien']
    ) ?>

    <?= $form->field($model, 'tindakan_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Tindakan::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Tindakan']
    ) ?>

    <?= $form->field($model, 'obat_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Obat::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Obat']
    ) ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_harga')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>