<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect\controllers\backend;

use yii\web\Controller;

class RedirectController extends Controller
{
    public function actionIndex()
    {
        return $this->renderContent('Hello from redirect controller.');
    }
}