<?php

use app\models\Transaksi;
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;

/** @var yii\web\View $this */

$this->title = 'Chart';
$this->params['breadcrumbs'][] = $this->title;

// Ambil data dari database menggunakan Active Record
$transaksiPerBulan = Transaksi::find()
    ->select(['MONTH(tanggal_transaksi) as bulan', 'COUNT(*) as jumlah_transaksi'])
    ->groupBy(['bulan'])
    ->orderBy(['bulan' => SORT_ASC])
    ->asArray()
    ->all();

// Ubah format data untuk ChartJs
$labels = [];
$dataSet = [];

foreach ($transaksiPerBulan as $item) {
    $bulan = DateTime::createFromFormat('!m', $item['bulan'])->format('F');
    $labels[] = $bulan;
    $dataSet[] = $item['jumlah_transaksi'];
}

$data = [
    'labels' => $labels,
    'datasets' => [
        [
            'label' => "Jumlah Transaksi",
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
        'type' => 'line',
        'options' => [
            'height' => 150,
            'width' => 150
        ],
        'data' => $data
    ]);
    ?>





</div>