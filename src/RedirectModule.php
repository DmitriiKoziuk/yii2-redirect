<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect;

use InvalidArgumentException;
use yii\base\Module;
use yii\di\Container;
use yii\web\Application as WebApp;
use yii\base\Application as BaseApp;
use yii\console\Application as ConsoleApp;
use DmitriiKoziuk\yii2ModuleManager\interfaces\ModuleInterface;
use DmitriiKoziuk\yii2ConfigManager\ConfigManagerModule;
use DmitriiKoziuk\yii2ModuleManager\ModuleManager;

class RedirectModule extends Module implements ModuleInterface
{
    const ID = 'dk-redirect';

    const TRANSLATE = self::ID;

    /**
     * @var Container
     */
    public $diContainer;

    /**
     * Overwrite this param if you backend app id is different from default.
     * @var string
     */
    public $backendAppId;

    /**
     * Overwrite this param if you frontend app id is different from default.
     * @var string
     */
    public $frontendAppId;

    /**
     * Domain name with protocol and without end slash.
     * Need for display image preview that load in @frontend location.
     * @var string
     */
    public $frontendDomainName;

    public function init()
    {
        /** @var BaseApp $app */
        $app = $this->module;
        $this->initLocalProperties($app);
        $this->registerTranslation($app);
        $this->registerClassesToDIContainer($app);
        $this->registerRules($app);
    }

    public static function getId(): string
    {
        return self::ID;
    }

    public function getBackendMenuItems(): array
    {
        return ['label' => 'Redirect', 'url' => ['/' . self::ID . '/redirect/index']];
    }

    public static function requireOtherModulesToBeActive(): array
    {
        return [
            ModuleManager::class,
            ConfigManagerModule::class,
        ];
    }

    /**
     * @param BaseApp $app
     * @throws InvalidArgumentException
     */
    private function initLocalProperties(BaseApp $app)
    {
        if ($app instanceof WebApp && $app->id == $this->backendAppId) {
            $this->controllerNamespace = __NAMESPACE__ . '\controllers\backend';
        }
        if ($app instanceof WebApp && $app->id == $this->frontendAppId) {
            $this->controllerNamespace = __NAMESPACE__ . '\controllers\frontend';
        }
        if ($app instanceof ConsoleApp) {
            array_push(
                $app->controllerMap['migrate']['migrationNamespaces'],
                __NAMESPACE__ . '\migrations'
            );
        }
        if (empty($this->backendAppId)) {
            throw new InvalidArgumentException('Property backendAppId not set.');
        }
        if (empty($this->frontendDomainName)) {
            throw new InvalidArgumentException('Frontend domain name not set.');
        }
    }

    private function registerTranslation(BaseApp $app)
    {
        $app->i18n->translations[self::TRANSLATE] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath'       => '@DmitriiKoziuk/yii2Redirect/messages',
        ];
    }

    private function registerClassesToDIContainer(BaseApp $app): void
    {
    }

    private function registerRules(BaseApp $app): void
    {
        if ($app instanceof WebApp && $app->id == $this->frontendAppId) {
            $app->getUrlManager()->addRules([
                [
                    'class' => __NAMESPACE__ . '\components\UrlRule',
                ],
            ]);
        }
    }
}