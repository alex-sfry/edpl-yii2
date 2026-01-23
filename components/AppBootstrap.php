<?php

namespace app\components;

use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\grid\GridView;

/**
 * App Bootstrap class
 */
class AppBootstrap implements BootstrapInterface
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
        require_once __DIR__ . '/../helpers/views_functions.php';

        $app->formatter->thousandSeparator = ' ';
        $app->formatter->nullDisplay = '-';
        $app->formatter->dateFormat = 'php:m-d-Y H:i:s';

        // Event::on(GridView::class, GridView::EVENT_BEFORE_RUN, function (Event $event) use ($app) {
        //     $app->getAssetManager()->bundles['yii\grid\GridViewAsset'] = ['js' => [], 'depends' => []];
        // });
        // Event::on(GridView::class, GridView::EVENT_AFTER_RUN, function (Event $event) {
        //     $view = $event->sender->getView();
        //     $view->js = [];
        // });
    }
}
