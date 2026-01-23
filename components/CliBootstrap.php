<?php

namespace app\components;

use yii\base\BootstrapInterface;

/**
 * App Bootstrap class
 */
class CliBootstrap implements BootstrapInterface
{
    /**
     * Bootstrap function
     *
     * @param \yii\base\Application $app
     * @return void
     */
    public function bootstrap($app): void
    {
        require_once __DIR__ . '/../helpers/functions.php';
        require_once __DIR__ . '/../helpers/systems.php';
    }
}
