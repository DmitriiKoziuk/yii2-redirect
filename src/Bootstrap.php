<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect;

use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use DmitriiKoziuk\yii2ConfigManager\ConfigManagerModule;
use DmitriiKoziuk\yii2ConfigManager\services\ConfigService;
use DmitriiKoziuk\yii2ModuleManager\services\ModuleRegistrationService;

final class Bootstrap implements BootstrapInterface
{
    /**
     * @param Application $app
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function bootstrap($app)
    {
        $container = Yii::$container;
        ModuleRegistrationService::addModule(
            RedirectModule::class,
            function () use ($container) {
                /** @var ConfigService $configService */
                $configService = $container->get(ConfigService::class);
                return [
                    'class' => RedirectModule::class,
                    'diContainer' => $container,
                    'backendAppId' => $configService->getValue(
                        ConfigManagerModule::GENERAL_CONFIG_NAME,
                        'backendAppId'
                    ),
                    'frontendAppId' => $configService->getValue(
                        ConfigManagerModule::GENERAL_CONFIG_NAME,
                        'frontendAppId'
                    ),
                    'frontendDomainName' => $configService->getValue(
                        ConfigManagerModule::GENERAL_CONFIG_NAME,
                        'frontendDomainName'
                    ),
                ];
            }
        );
    }
}
