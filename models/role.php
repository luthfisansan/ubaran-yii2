<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $permission_id
 *
 * @property Permission $permission
 * @property UserRole[] $userRoles
 */
class role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['permission_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['permission_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permission::class, 'targetAttribute' => ['permission_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'permission_id' => 'Permission ID',
        ];
    }

    /**
     * Gets query for [[Permission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permission::class, ['id' => 'permission_id']);
    }

    /**
     * Gets query for [[UserRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRole::class, ['role_id' => 'id']);
    }
}
