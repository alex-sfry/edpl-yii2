<?php

namespace app\modules\edsm;

use yii\base\BootstrapInterface;

/**
 * User module Bootstrap class
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
            'edsm/system/create' => 'edsm/system/create',
        ]);
    }
}
