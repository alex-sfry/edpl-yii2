<?php

use Symfony\Component\VarDumper\VarDumper;
use yii\helpers\Html;

/**
 * Html::encode() wrapper
 */
function e(string $val, bool $doubleEncode = true): string
{
    return Html::encode($val, $doubleEncode);
}

/**
 * Dump&Die - VarDumper::dump() wrapper
 */
function d(mixed $var): void
{
    VarDumper::dump($var);
    die();
}

/**
 * VarDumper::dump() wrapper
 */
function du(mixed $var): void
{
    VarDumper::dump($var);
}


function isActive(string $urlRoute, $exact = true): bool
{
    if ($exact) {
        return \Yii::$app->controller->route === $urlRoute ? true : false;
    }

    return str_contains(\Yii::$app->controller->route, $urlRoute) ? true : false;
}
