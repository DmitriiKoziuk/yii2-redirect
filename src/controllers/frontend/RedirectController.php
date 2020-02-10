<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect\controllers\frontend;

use Yii;
use yii\web\Controller;
use DmitriiKoziuk\yii2Redirect\entities\RedirectEntity;

class RedirectController extends Controller
{
    public function actionRedirect(RedirectEntity $redirectEntity): void
    {
        $s = 'ss';
        Yii::$app->response->redirect($redirectEntity->to_url, 301)->send();
        return;
    }
}