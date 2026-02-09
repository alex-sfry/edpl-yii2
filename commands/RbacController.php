<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // add "manageAll" permission
        $manage_all = $auth->createPermission('manageAll');
        $manage_all->description = 'Manage all';
        $auth->add($manage_all);

        // add "admin" role and give this role the "manageAll" permission
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manage_all);

        // Assign roles to users. 1 is ID returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);
    }
}
