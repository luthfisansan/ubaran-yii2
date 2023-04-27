<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id
 * @property int $pasien_id
 * @property int $tindakan_id
 * @property int $obat_id
 * @property int $jumlah
 * @property float $total_harga
 * @property string $tanggal_transaksi
 *
 * @property Obat $obat
 * @property Pasien $pasien
 * @property Tindakan $tindakan
 */
class Transaksi extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id', 'tindakan_id', 'obat_id', 'jumlah', 'total_harga'], 'required'],
            [['pasien_id', 'tindakan_id', 'obat_id', 'jumlah'], 'integer'],
            [['total_harga'], 'number'],
            [['tanggal_transaksi'], 'safe'],
            [
                ['obat_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Obat::class, 'targetAttribute' => ['obat_id' => 'id']
            ],
            [
                ['pasien_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Pasien::class, 'targetAttribute' => ['pasien_id' => 'id']
            ],
            [
                ['tindakan_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Tindakan::class, 'targetAttribute' => ['tindakan_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pasien_id' => 'Nama Pasien',
            'tindakan_id' => 'Nama Tindakan',
            'obat_id' => 'Nama Obat',
            'jumlah' => 'Jumlah',
            'total_harga' => 'Total Harga',
            'tanggal_transaksi' => 'Tanggal Transaksi',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'obat_id']);
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasien_id']);
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'tindakan_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['tanggal_transaksi'],
                ],
                'value' => function () {
                    return date('Y-m-d');
                },
            ],
        ];
    }
}
