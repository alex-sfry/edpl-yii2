<?php

namespace app\modules\noar;

use yii\base\BootstrapInterface;

/**
 * Noar module Bootstrap class
 */
class ModuleBootstrap implements BootstrapInterface
{
    /**
     * Bootstrap function
     *
     * @param \yii\base\Application $app
     * @return void
     */
    public function bootstrap($app): void
    {
        $app->getUrlManager()->addRules([
            'noar/<controller>/<action>/<id:\d+>' => 'noar/<controller>/<action>',
            'noar/<controller>/<action>' => 'noar/<controller>/<action>',
            'noar/<controller>' => 'noar/<controller>/index',
        ]);
    }
}
