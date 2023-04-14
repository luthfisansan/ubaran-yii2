<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $nama
 * @property string $tanggal_lahir
 * @property int $wilayah_id
 *
 * @property Pembayaran[] $pembayarans
 * @property Transaksi[] $transaksis
 * @property Wilayah $wilayah
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tanggal_lahir', 'wilayah_id'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['wilayah_id'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tanggal_lahir' => 'Tanggal Lahir',
            'wilayah_id' => 'Wilayah ID',
        ];
    }

    /**
     * Gets query for [[Pembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::class, ['pasien_id' => 'id']);
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['pasien_id' => 'id']);
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }
}
