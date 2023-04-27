<?php

namespace app\controllers;

use Yii;
use yii\console\Controller;
use yii\rbac\DbManager;

class RbacController extends \yii\web\Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // create roles
        $adminRole = $auth->createRole('admin');
        $pegawaiRole = $auth->createRole('pegawai');
        $userRole = $auth->createRole('user');
        // add roles
        $auth->add($adminRole);
        $auth->add($pegawaiRole);
        $auth->add($userRole);

        // create permissions
        $transaksiPermission = $auth->createPermission('transaksi');
        $pasienPermission = $auth->createPermission('pasien');
        $tindakanPermission = $auth->createPermission('tindakan');
        $obatPermission = $auth->createPermission('obat');
        $wilayahPermission = $auth->createPermission('wilayah');
        $userPermission = $auth->createPermission('user');

        // add permissions
        $auth->add($transaksiPermission);
        $auth->add($pasienPermission);
        $auth->add($tindakanPermission);
        $auth->add($obatPermission);
        $auth->add($wilayahPermission);
        $auth->add($userPermission);

        // add permission to roles
        $auth->addChild($adminRole, $wilayahPermission);
        $auth->addChild($adminRole, $userPermission);
        $auth->addChild($adminRole, $transaksiPermission);
        $auth->addChild($adminRole, $pasienPermission);
        $auth->addChild($adminRole, $tindakanPermission);
        $auth->addChild($adminRole, $obatPermission);


        $auth->addChild($pegawaiRole, $transaksiPermission);
        $auth->addChild($pegawaiRole, $pasienPermission);
        $auth->addChild($pegawaiRole, $tindakanPermission);
        $auth->addChild($pegawaiRole, $obatPermission);

        $auth->addChild($userRole, $transaksiPermission);
        $auth->addChild($userRole, $pasienPermission);
        $auth->addChild($userRole, $tindakanPermission);
        $auth->addChild($userRole, $obatPermission);
    }

    public function actionAssign($role, $userId)
    {
        $auth = Yii::$app->authManager;
        $roleObj = $auth->getRole($role);
        $auth->assign($roleObj, $userId);
    }
}
