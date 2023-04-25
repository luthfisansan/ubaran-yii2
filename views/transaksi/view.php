<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */

$this->title = 'Transaksi #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'pasien_id',
                'value' => function ($model) {
                    return $model->pasien->nama; // Display nama of pasien
                }
            ],
            [
                'attribute' => 'tindakan_id',
                'value' => function ($model) {
                    return $model->tindakan->nama; // Display nama of tindakan
                }
            ],
            [
                'attribute' => 'obat_id',
                'value' => function ($model) {
                    return $model->obat->nama; // Display nama of obat
                }
            ],
            'jumlah',
            'total_harga',
        ],
    ]) ?>

</div>