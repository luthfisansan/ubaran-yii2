<?php

use app\models\transaksi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            //'total_harga',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>