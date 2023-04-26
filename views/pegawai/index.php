<?php

use app\models\Tindakan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Chart Tindakan';
$this->params['breadcrumbs'][] = $this->title;

// Ambil data dari database menggunakan Active Record
$tindakan = Tindakan::find()
    ->select(['nama', 'jumlah'])
    ->orderBy(['jumlah' => SORT_DESC])
    ->limit(10)
    ->asArray()
    ->all();

// Ubah format data untuk ChartJs
$labels = [];
$dataSet = [];

foreach ($tindakan as $item) {
    $labels[] = $item['nama'];
    $dataSet[] = $item['jumlah'];
}

$data = [
    'labels' => $labels,
    'datasets' => [
        [
            'label' => "Jumlah Tindakan",
            'backgroundColor' => "rgba(179,181,198,0.2)",
            'borderColor' => "rgba(179,181,198,1)",
            'pointBackgroundColor' => "rgba(179,181,198,1)",
            'pointBorderColor' => "#fff",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(179,181,198,1)",
            'data' => $dataSet
        ]
    ]
];
?>

<div class="chart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ChartJs::widget([
        'type' => 'bar',
        'options' => [
            'height' => 400,
            'width' => 400
        ],
        'data' => $data
    ]);
    ?>

</div>