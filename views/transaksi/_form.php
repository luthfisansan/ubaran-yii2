<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasien_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Pasien::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Pasien', 'id' => 'pasien-id']
    ) ?>

    <?= $form->field($model, 'tindakan_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Tindakan::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Tindakan', 'id' => 'tindakan-id']
    ) ?>

    <?= $form->field($model, 'obat_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Obat::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Obat', 'id' => 'obat-id']
    ) ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true, 'id' => 'jumlah']) ?>

    <!-- <?= $form->field($model, 'total_harga')->textInput(['maxlength' => true, 'readonly' => true, 'id' => 'total-harga']) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
    // Fungsi untuk menghitung total harga
    function hitungTotalHarga() {
        var pasienId = $('#pasien-id').val();
        var tindakanId = $('#tindakan-id').val();
        var obatId = $('#obat-id').val();
        var jumlah = $('#jumlah').val();

        // Ajukan permintaan ke server untuk menghitung total harga
        $.ajax({
            url: '<?= Url::to(['hitung-total-harga']) ?>',
            method: 'post',
            data: {
                pasienId: pasienId,
                tindakanId: tindakanId,
                obatId: obatId,
                jumlah: jumlah
            },
            success: function(response) {
                $('#total-harga').val(response.totalHarga);
            }
        });
    }

    // Panggil fungsi hitungTotalHarga() ketika nilai pada form berubah
    $('#pasien-id, #tindakan-id, #obat-id, #jumlah').on('change keyup', function() {
        hitungTotalHarga();
    });
JS;

$this->registerJs($script);
?>