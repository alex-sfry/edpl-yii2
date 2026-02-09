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

        // add "createPost" permission
        $create = $auth->createPermission('create');
        $create->description = 'Create';
        $auth->add($create);

        // add "updatePost" permission
        $update = $auth->createPermission('update');
        $update->description = 'Update';
        $auth->add($update);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $create);

        // Assign roles to users. 1 is ID returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);
    }
}
